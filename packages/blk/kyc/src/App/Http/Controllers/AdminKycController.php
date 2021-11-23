<?php

namespace Blk\Kyc\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Blk\Kyc\App\Models\Kyc;
use Blk\Kyc\App\Models\KycType;
use Blk\Kyc\App\Models\KycDocument;
use Blk\Kyc\App\Jobs\SendEmailJob;
use Blk\Kyc\App\Jobs\RejectEmailJob;
use App\Models\User;
use Auth;

use Session;



class AdminKycController extends Controller
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var Kyc
     */
    private $kyc;

    /**
     * KycManagementController constructor.
     * @param User $admin
     * @param Kyc $user
     */

    public function __construct(User $user, Kyc $kyc)
    {
        $this->user = $user;
        $this->kyc = $kyc;

    }

    /**
     * Users Kyc List 
     * @return View
     */
 
    public function kycList()
    {
        try{
            $kyc = $this->kyc->get();
            return view('kyc::admin-kyc.kyc-list',compact('kyc'));
        }
        catch(Exception $exception)
        {
            Log::error('Users Kyc List '.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }

    /**
     * Users Kyc Form View
     * @param  $id
     * @return View
     */

    public function kycView($id)
    {
        try{
            $kyc = $this->kyc->where('id',$id)->first();
            $kycType = KycDocument::where('kyc_id',$id)
                    ->join('kyc_types','kyc_types.id' , '=' , 'kyc_document.type_id')
                    ->select('kyc_document.*','kyc_types.name')
                    ->first();
            // $kycType = KycDocument::where('kyc_id',$id)->with('KycType')->first();
            return view('kyc::admin-kyc.kyc-view',compact('kyc','kycType'));
        }
        catch(Exception $exception)
        {
            Log::error('Users Kyc Form View '.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }

    /**
     * Send Mail For Approve users
     * @param  $user_id
     * @return RedirectResponse
     */

    public function sendEmail($user_id)
    {
        try{
            $sendStatus = $this->kyc->where('user_id',$user_id)->update(['status'=>'1']);
            $users = $this->user->where('id',$user_id)->first();
            $details=new SendEmailJob($users);
            dispatch($details);
            return redirect()->route('kyc.admin-kyc-list')->with('success','KYC Approved Successfully');
        }
        catch(Exception $exception)
        {
            Log::error('Send Mail For Approve users '.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }

    /**
     * Send Mail For Reject users
     * @param  $user_id
     * @return RedirectResponse
     */

    public function rejectEmail($user_id)
    {
        try{
            $users = $this->user->where('id',$user_id)->first();
            $details=new RejectEmailJob($users);
            dispatch($details);
            $deleteKyc = $this->kyc->where('user_id',$user_id)->delete();
            return redirect()->route('kyc.admin-kyc-list')->with('success','KYC rejected successfully');
        }
        catch(Exception $exception)
        {
            Log::error('Send Mail For Reject users '.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
 
    }

}
