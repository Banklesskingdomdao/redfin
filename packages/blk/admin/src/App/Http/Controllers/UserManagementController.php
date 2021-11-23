<?php


namespace Blk\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Auth;

class UserManagementController extends Controller
{
      /**
     * @var User
     */
    private $user;

    /**
     * UserManagementController constructor.
     * @param User $admin
     */

    public function __construct(User $user)
    {
        $this->user = $user;

    }

    /**
     * User Dashboard View
     * @return View
     */

    public function index(Request $request)
    {
        try{
            $users = User::all();
            return view('admin::dashboard.users', compact('users'));
        }
        catch(Exception $exception)
        {
            Log::error('User Dashboard View'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }
    
     /**
     * Active & Block Users
     * @param $id
     * @return RedirectResponse
     */

    public function blockUser($id)
    {
        try{
            $getUser = $this->user->where('id',$id)->first();
                if($getUser->status==1){
                    $blockUser = $this->user->where('id',$id)->update(['status'=>'0']);
                }else{
                    $blockUser = $this->user->where('id',$id)->update(['status'=>'1']);
                }
            return true;
        }
        catch(Exception $exception)
        {
            Log::error('Active & Block Users'.$exception->getMessage());
            return back()->with('error',$exception->getMessage());
        }
    }


}
