<?php

namespace Blk\User\App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Blk\Kyc\App\Models\Kyc;
use Auth;
use View;

class DashBoardController extends Controller
{   
    public function __construct(Kyc $kyc ,User $user)
    {
        $this->kyc = $kyc;
        $this->user = $user;
 
    }

    /** 
    * User Dashboard View
    * @return View
    */

    public function dashBoard()
    {
        try{
            return view('user::dashboard');
        }
        catch(Exception $exception)
        {
            Log::error('User Dashboard View'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }

    /** 
    * Logout For Users
    * @return view
    */

    public function logout()
    {
        try{
            return view('auth.login');
        }
        catch(Exception $exception)
        {
            Log::error('Logout For Users'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }

}