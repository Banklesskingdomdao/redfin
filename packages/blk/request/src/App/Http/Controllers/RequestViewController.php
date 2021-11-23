<?php

namespace Blk\Request\App\Http\Controllers;
use App\Http\Controllers\Controller;
use Blk\Admin\App\Models\Admin;
use App\Models\User;
use Auth;
use Blk\Request\App\Models\RequestForm;
use Blk\Request\App\Models\ChangeOffer;
use Blk\Kyc\App\Models\Kyc;
use Blk\Kyc\App\Models\KycType;
use Blk\Kyc\App\Models\KycDocument;
use Illuminate\Http\Request;
use Blk\Request\App\Requests\ChangeOfferRequest;
use Blk\Request\App\Jobs\AdminApproveEmailJob;
use Blk\Request\App\Jobs\AdminRejectEmailJob;
use Blk\Request\App\Jobs\AdminChangeOfferJob;


class RequestViewController extends Controller
{
     /**
     * @var User
     */
    private $user;
    /**
     * @var RequestForm
     */
    private $requestForm;
    /**
     * @var ChangeOffer
     */
    private $changeOffer;
    /**
     * @var Admin
     */
    private $admin;
    /**
     * @var Kyc
     */
    private $kyc;
    /**
     * @var KycDocument
     */
    private $kycDocument;

    /**
     * RequestViewController constructor.
     * @param User $user
     * @param RequestForm $requestForm
     * @param ChangeOffer $changeOffer
     * @param Admin $admin
     * @param Kyc $kyc
     * @param KycDocument $kycDocument
     **/

    public function __construct(User $user ,RequestForm $requestForm ,ChangeOffer $changeOffer ,Admin $admin ,Kyc $kyc ,KycDocument $kycDocument)
    {
        $this->user = $user;
        $this->requestForm = $requestForm;
        $this->changeOffer = $changeOffer;
        $this->admin = $admin;    
        $this->kyc = $kyc;
        $this->kycDocument = $kycDocument;
    }

    /**
     * Basic Request List for Users
     * @return View
    */

    public function requestList()
    {
        try{
            $requests = $this->requestForm->with('User','propertyCondition','propertyType')->where(['status'=>'0'])->get();
            return view('request::admin-request.request-list',compact('requests'));
        }
        catch(Exception $exception)
        {
           Log::error('Basic Request List for Users'.$exception->getMessage());
           return back()->with('error',$exception->getMessage());
        } 
    }

    /**
     * kyc and Request List for Users
     * @param $id
     * @return View
    */
    
    public function requestView($id)
    {
        try{
            $request = $this->requestForm->where('id',$id)->with('User','propertyCondition','propertyType')->first();
            $userId = $request->user_id;
            $kyc = $this->kyc->where('user_id',$userId)->first();
            $kycId = $kyc->id;
            $kycDocument = $this->kycDocument->where('kyc_id',$kycId)
                        ->join('kyc_types','kyc_types.id' , '=' , 'kyc_document.type_id')
                        ->select('kyc_document.*','kyc_types.name')
                        ->first();
            $changeOffer = $this->changeOffer->where('request_id',$id)->orderBy('created_at', 'DESC')->get();
            return view('request::admin-request.request-view',compact('request','changeOffer','kyc','kycDocument'));
        }
        catch(Exception $exception)
        {
           Log::error('kyc and Request List for Users'.$exception->getMessage());
           return back()->with('error',$exception->getMessage());
        }
    }

    /**
     * admin send approve mail for request form
     * @param $id
     * @return RedirectResponse
    */

    public function sendEmail($id)
    {
        try{
            $requestAmount = $this->requestForm->where('id',$id)->first();
            $checkOffer = $this->changeOffer->where('request_id',$id)->first();

            if(!$checkOffer){
                $admin = $this->admin->first();
                $adminId = $admin->id;

                $addOffer = new changeOffer();
                $addOffer->admin_id = $adminId;
                $addOffer->request_id = $id;
                $addOffer->loan_amount = $requestAmount->amount_of_loan_needed;
                $addOffer->description = 'this is final amount of loan';
                
                $addOffer->save();

                $sendStatus = $this->requestForm->where('id',$id)->update(['status'=>'1']);
                $user = $this->requestForm->where('id',$id)->first();
                $userId = $user->user_id;
                $users = $this->user->where('id',$userId)->first();
                $details=new AdminApproveEmailJob($users);
                dispatch($details);
                return redirect()->route('admin.approved-loans');
            }
            else{
                $sendStatus = $this->requestForm->where('id',$id)->update(['status'=>'1']);
                $user = $this->requestForm->where('id',$id)->first();
                $userId = $user->user_id;
                $users = $this->user->where('id',$userId)->first();
                $details=new AdminApproveEmailJob($users);
                dispatch($details);
                return redirect()->route('admin.approved-loans');
            }
        }
        catch(Exception $exception)
        {
           Log::error('admin send approve mail for request form'.$exception->getMessage());
           return back()->with('error',$exception->getMessage());
        }
    }

    /**
     * Send Mail For Reject Users
     * @param  $id
     * @return RedirectResponse
    */

    public function rejectEmail($id)
    {
        try{
            $user = $this->requestForm->where('id',$id)->first();
            $users = $this->user->where('id',$user->user_id)->first();
            $details=new AdminRejectEmailJob($users);
            dispatch($details);
            return redirect()->route('admin.request-list')->with('success','Loan Rejected Successfully');
        }
        catch(Exception $exception)
        {
           Log::error('Send Mail For Reject Users'.$exception->getMessage());
           return back()->with('error',$exception->getMessage());
        }
    }

    /**
     * Change Offer Method Admin
     * @param  ChangeOfferRequest $request
     * @return back
    */

     public function changeOffer(ChangeOfferRequest $request)
    {
        try{
            $admin = $this->admin->first();
            $adminId = $admin->id;
            
            $update = $this->changeOffer->where('request_id',$request->id)->update(['status' => '0']);

            $changeOffer = new changeOffer();

            $changeOffer->admin_id = $adminId;
            $changeOffer->request_id = $request->id;
            $changeOffer->loan_amount = $request->loan_amount;
            $changeOffer->description = $request->description;
            $changeOffer->status = '3';

            $changeOffer->save();
            $user = $this->requestForm->where('id',$request->id)->first();
            $userId = $user->user_id;
            $users = $this->user->where('id',$userId)->first();
            $details=new AdminChangeOfferJob($users);
            dispatch($details);
            return back()->with('success','Change Offer Send Successfully');
        }
        catch(Exception $exception)
        {
           Log::error('Change Offer Method Admin'.$exception->getMessage());
           return back()->with('error',$exception->getMessage());
        }
    }

    /**
     * Approved Loans
     * @return RedirectResponse
    */

    public function approvedLoan()
    {
        try{
            return redirect()->route('admin.approved')->with('success','Loan Approved Successfully');   
        }
        catch(Exception $exception)
        {
           Log::error('Approved Loans'.$exception->getMessage());
           return back()->with('error',$exception->getMessage());
        }
    }

    /**
     * Approved Loans 
     * @return view
    */

    public function approved()
    {
        try{
            $approvedLoan = $this->requestForm->where(['status'=>'1'])->with('User')->get();
            $approved = $this->requestForm->where(['status'=>'1'])->with('User')->first();
            if(isset($approved)){
            $offer = $this->changeOffer->where('request_id',$approved->id)->latest()->first();
            }
            return view('request::admin-request.approve-loan',compact('approvedLoan'));
        }
        catch(Exception $exception)
        {
           Log::error('Approved Loans'.$exception->getMessage());
           return back()->with('error',$exception->getMessage());
        }
    }

     /**
     * Approved Loans View
     * @param $id
     * @return view
    */
    public function approveView($id)
    {
        try{
            $approveView = $this->requestForm->where('id',$id)->where(['status'=>'1'])->with('User','propertyCondition','propertyType')->first();
            $changeOffers = $this->changeOffer->where('request_id',$id)->latest()->first();
            return view('request::admin-request.approve-view',compact('approveView','changeOffers'));
        }
        catch(Exception $exception)
        {
           Log::error('Approved Loans View'.$exception->getMessage());
           return back()->with('error',$exception->getMessage());
        }
    }

}
