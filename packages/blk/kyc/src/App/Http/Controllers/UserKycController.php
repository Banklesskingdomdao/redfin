<?php

namespace Blk\Kyc\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Blk\Kyc\App\Requests\KycRequest;
use Blk\Kyc\App\Models\Kyc;
use Blk\Kyc\App\Models\KycDocument;
use Blk\Kyc\App\Models\KycType;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Blk\Kyc\App\Jobs\UserSendEmailJob;
use Auth;
use View;
use App\Helpers\imageUpload;
use DB;


class UserKycController extends Controller
{
    use imageUpload;

    /**
     * @var Kyc
     */
    private $kyc;
    /**
     * @var User
     */
    private $user;
    /**
     * @var KycDocument
     */
    private $kycDocument;


    /**
     * LoginController constructor.
     * @param Kyc $kyc
     * @param User $user
     * @param KycDocument $kycDocument
    */

    public function __construct(Kyc $kyc , User $user , KycDocument $kycDocument)
    {
        $this->kyc = $kyc;
        $this->user = $user;
        $this->kycDocument = $kycDocument;
    }

    /** 
    * User Kyc Form View
    * @return View
    */

    public function kyc()
    {
        try{
            $userId = Auth::id();

            $kycForm = $this->kyc->where('user_id',$userId)->first();
            $kycStatus = $this->kyc->where('user_id',$userId)->where(['status'=>'1'])->first();
            if(!$kycForm){
            $kycType = KycType::all();
            return view('kyc::user-kyc.kyc-management',compact('kycType','userId'));
            }
            else if($kycStatus)
            {
                return view('kyc::user-kyc.approve');
            }
            else{
                return view('kyc::user-kyc.verify',compact('kycForm'));
            }
        }
        catch(Exception $exception)
        {
            Log::error('User Kyc Form View '.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }    

    /** 
    * Get Users Kyc Form 
    * @param KycRequest $request
    * @return RedirectResponse
    */

    public function kycList(KycRequest $request)
    {
        try{
            $userId = Auth::id();
            $kycForm = $this->kyc->where('user_id',$userId)->first();
            if(!$kycForm){
            $kyc = $this->kyc;
            $kyc->name = $request->name;
            $kyc->user_id = $userId;
            $kyc->phone_number = $request->phone_number;
            $kyc->date_of_birth = $request->date_of_birth;
            $kyc->country = $request->country;
            $kyc->address_line_1 = $request->address_line_1;
            $kyc->address_line_2 = $request->address_line_2;
            $kyc->city = $request->city;
            $kyc->zip_code = $request->zip_code;
            $kyc->telegram_username = $request->telegram_username;
            $kyc->selfie_document = $this->commonImageUpload($request->selfie_document,'kyc_image');
            $kyc->save();
            
            $kycList = new KycDocument();
            $kycList->kyc_id = $kyc->id;
            $kycList->type_id = $request->verify_id;
            $kycList->front_image = $this->commonImageUpload($request->front_image,'kyc_image');
            $kycList->back_image = $this->commonImageUpload($request->back_image,'kyc_image');
            $kycList->save();
            $users = $this->user->where('id',$userId)->first();
            $details= new UserSendEmailJob($users);
            dispatch($details);
            return redirect()->route('kyc.verify-form')->with('success', 'Your Form Submitted Successfully');
            }
            else{
                return back();
            }
        }
        catch(Exception $exception)
        {
            Log::error('Get Users Kyc Form'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }

    /** 
    * Verify Kyc Page
    * @return View
    */

    public function verify()
    {
        try{
            $userId = Auth::id();
            $kycForm = $this->kyc->where('user_id',$userId)->first();
            return view('kyc::user-kyc.verify',compact('kycForm'));
        }
        catch(Exception $exception)
        {
            Log::error('Verify Kyc Page'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }

    /** 
    * Kyc Form view
    * @param $id
    * @return view
    */

    public function viewKyc($id)
    {
        try{
            $viewKyc = $this->kyc->where('id',$id)->first();
            $kycType = $this->kycDocument->where('kyc_document.kyc_id',$id)
                    ->join('kyc_types','kyc_types.id' , '=' , 'kyc_document.type_id')
                    ->select('kyc_document.*','kyc_types.name')
                    ->first();
            // $kycType = $this->kycDocument->where('kyc_id',$id)->with('KycType')->first();
            return view('kyc::user-kyc.user-kyc-view',compact('viewKyc','kycType'));
        }
        catch(Exception $exception)
        {
            Log::error('Kyc Form view'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }

}
