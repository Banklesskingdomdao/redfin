<?php

namespace Blk\Request\App\Http\Controllers;
use App\Http\Controllers\Controller;
use Blk\Request\App\Models\PropertyCondition;
use Blk\Request\App\Models\PropertyType;
use Blk\Request\App\Models\RequestForm;
use Blk\Request\App\Models\ChangeOffer;
use Blk\Kyc\App\Models\Kyc;
use Auth;
use App\Models\User;
use Blk\Request\App\Requests\RequestFormRequest;
use Blk\Request\App\Requests\ChangeOfferRequest;
use Blk\Request\App\Jobs\UserSendEmailJob;
use Blk\Request\App\Jobs\UserChangeOfferEmailJob;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * @var PropertyCondition
     */
    private $propertyCondition;
    /**
     * @var PropertyType
     */
    private $propertyType;
    /**
     * @var RequestForm
     */
    private $requestForm;
    /**
     * @var User
     */
    private $user;
    /**
     * @var ChangeOffer
     */
    private $changeOffer;
    /**
     * @var Kyc
     */
    private $kyc;

     /**
     * RequestController constructor.
     * @param PropertyCondition $propertyCondition
     * @param PropertyType $propertyType
     * @param RequestForm $requestForm
     * @param User $user
     * @param ChangeOffer $changeOffer
     * @param Kyc $kyc
     */
    
    public function __construct(PropertyCondition $propertyCondition, PropertyType $propertyType, RequestForm $requestForm, User $user ,ChangeOffer $changeOffer ,Kyc $kyc)
    {
        $this->propertyCondition = $propertyCondition;
        $this->propertyType = $propertyType;
        $this->requestForm = $requestForm;
        $this->user = $user;
        $this->changeOffer = $changeOffer;
        $this->kyc = $kyc;
    }   

    /**
     * Request Form 
     * @return View
    */

    public function request()
    {
        try{
            $userId = Auth::id();
            $conditions = $this->propertyCondition->all();
            $types = $this->propertyType->all();
            return view('request::user-request.request',compact('conditions','types','userId'));
        }
        catch(Exception $exception)
        {
            Log::error('Request Form'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }

    /**
     * Request Form List
     * @return RedirectResponse
    */

    public function requestList()
    {
        try{
            $userId = Auth::id();
            $kycStatus = $this->kyc->where('user_id',$userId)->where(['status' =>'1'])->first();
            if($kycStatus)
            {
                $requestForm = $this->requestForm->where('user_id',$userId)->where(['status'=>'0'])->get();
                return view('request::user-request.request-list',compact('requestForm'));
            }
            else{
                return redirect()->route('user.kyc')->with('success',"You Don't Have Access");
            }
        }
        catch(Exception $exception)
        {
            Log::error('Request Form List'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }

    /**
     * Get Request Form 
     * @param RequestFormRequest $request
     * @return RedirectResponse
    */

    public function getRequest(RequestFormRequest $request)
    {
        try{
            $userId = Auth::id();
            $loanRequest = $this->requestForm->create($request->all());
            $firstOffer = new changeOffer();
            
            $firstOffer->user_id = $userId;
            $firstOffer->request_id = $loanRequest->id;
            $firstOffer->loan_amount = $request->amount_of_loan_needed;
            $firstOffer->description = $request->property_description;
            $firstOffer->status = 3;

            $firstOffer->save();
            $users = $this->user->where('id',$userId)->first();
            $details=new UserSendEmailJob($users);
            dispatch($details);
            return redirect()->route('user.request-list')->with('success','Loan Request added successfully');
        }
        catch(Exception $exception)
        {
            Log::error('Get Request Form'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }

    /**
     * View Request Loan 
     * @param $id
     * @return View
    */

    public function viewLoan($id)
    {
        try{
            $request = $this->requestForm->where('id',$id)->with('User','propertyCondition','propertyType')->first();
            $changeOffer = $this->changeOffer->where('request_id',$id)->orderBy('created_at','DESC')->get();
            return view('request::user-request.user-view-loan',compact('request','changeOffer'));  
        }
        catch(Exception $exception)
        {
            Log::error('View Request Loan'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }     
    }

     /**
     * View Request Loan 
     * @param ChangeOfferRequest $request
     * @return back
    */

    public function changeOffer(ChangeOfferRequest $request)
    {
        try{
            $update = $this->changeOffer->where('request_id',$request->request_id)->update(['status' => '0']);

            $userId = Auth::id();
            $changeOffer = new changeOffer();
            $changeOffer->user_id = $userId;
            $changeOffer->request_id = $request->request_id;
            $changeOffer->loan_amount = $request->loan_amount;
            $changeOffer->description = $request->description;
            $changeOffer->status = '3';

            $changeOffer->save();
            $users = $this->user->where('id',$userId)->first();
            $details=new UserChangeOfferEmailJob($users);
            dispatch($details);

            return back()->with('success','Change Offer Send Successfully');
        }
        catch(Exception $exception)
        {
            Log::error('View Request Loan'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        } 
    }

     /**
     * Approved Loans 
     * @return RedirectResponse
    */

    public function yourLoan()
    {
        try{
            $userId = Auth::id();
            $userLoans = [];
            $loan = $this->requestForm->where('user_id',$userId)->where(['status' =>'1'])->get();
            if($loan){
            foreach($loan as $loans){
            $yourLoan = $this->changeOffer->where('request_id',$loans->id)->with('RequestForm')->latest()->first();
            array_push($userLoans,$yourLoan);
            }
            // $changeOffer = $this->changeOffer->where('request_id',$loan->id)->latest()->get();
            return view('request::user-request.your-loans',compact('userLoans'));
            }
            else{
                return redirect()->route('user.request-list');
            }
        }
        catch(Exception $exception)
        {
            Log::error('Approved Loans'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        } 
    }

}