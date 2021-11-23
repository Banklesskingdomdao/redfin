<?php

namespace Blk\Admin\App\Http\Controllers;

use Illuminate\Http\Request;
use Blk\Admin\App\Requests\AdminLoginRequest;
use Blk\Admin\App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Session;
use Blk\Admin\App\Jobs\ResetPasswordEmailJob;


class LoginController extends Controller
{
    /**
     * @var Admin
     */
    private $admin;
    /**
     * @var User
     */
    private $user;
  
    
    /**
     * LoginController constructor.
     * @param Admin $admin
     * @param User $user
     */
    
    public function __construct(Admin $admin , User $user)
    {
        $this->admin = $admin;
        $this->user = $user;

    }

    /**
     * Admin Login View
     * @return View
     */

    public function login()
    {
        try{
            return view('admin::admin-login.login');
        }
        catch(Exception $exception)
        {
            Log::error('Amdin Login'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }

    /** 
     * Admin Login
    * @param AdimnLoginRequest $request
    * @return RedirectResponse
    */

    public function doLogin(AdminLoginRequest $request)
    {
        try{
            $admin = $this->admin->where('email',$request->email)->where('password',$request->password)->first();
            if(isset($admin)) {
                return redirect()->route('admin.list')->with('success','Login Successfully');
            }else{
                return back()->with('error','Invalid Credentials');
            }
        }
        catch(Exception $exception)
        {
            Log::error('Amdin Login'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }

    /** 
     * Users List
    * @return View
    */

    public function list()
    {
        try{
            $users = $this->user->get();
            return view('admin::admin-dashboard.users',compact('users'));
        }
        catch(Exception $exception)
        {
            Log::error('User List'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }

    }

    /** 
     * Admin Logout
    * @return RedirectResponse
    */

    public function logout()
    {
        try{
            Session::flush();
            return redirect()->route('admin.login.page');
        }
        catch(Exception $exception)
        {
            Log::error('Admin Logout'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }

    /** 
     * Forgot Password
    * @return View
    */

    public function forgotPassword()
    {
        try{
            return view('admin::admin-login.forgot-password');
        }
        catch(Exception $exception)
        {
            Log::error('Forgot Password'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }

    }

     /** 
     * Get Email
     * @param Request $request
    * @return Back
    */

    public function getEmail(Request $request)
    {
        try{
            $email = $this->admin->where('email',$request->email)->first(); 
            if(!$email){
                return back()->with('error','Please Enter Verified Email');
            }
            else{
                $details= new ResetPasswordEmailJob($email);
                dispatch($details);
                return back()->with('success','Successfully Send Mail Please Verify Your Mail');
            }
        }
        catch(Exception $exception)
        {
            Log::error('Get Email'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }

    /** 
     * View Reset Password Page
     * @param $id
    * @return View
    */

    public function resetPassword($id)
    {
        try{
            return view('admin::admin-login.reset-password',compact('id'));
        }
        catch(Exception $exception)
        {
            Log::error('View Reset Password Page'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }

    /** 
     * Get And Update New Password
     * @param Request $request
    * @return RedirectResponse
    */

    public function getNewPassword(Request $request)
    {
        try{
            $new = Admin::where('email','jegancs0215@gmail.com')->update(['password' => $request->password]);
            return redirect()->route('admin.login.page')->with('success','Password Changed Successfully');
        }
        catch(Exception $exception)
        {
            Log::error('Get And Update New Password'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }
}