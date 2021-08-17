<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePassword;
use App\Subscriber;
use App\Video;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.whereIn('user_id', $sub)->
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totaluser = count(User::get());
        $totalsub = count(Subscriber::pluck('user_id')->unique());
        $totalvideo = count(Video::get());
        $totalrevenue = Subscriber::sum('amount');
        // return $totalsub;
        return view('admin.index', compact(['totaluser', 'totalsub', 'totalvideo', 'totalrevenue']));
    }
    public function gotochangepassword(){
        return view('admin.change_password');
    }


    // Change Password

    public function changepassword(ChangePassword $request)
{
    // return $id;
    if (!(Hash::check($request->get('oldpassword'), Auth::user()->password))) {
        return redirect()->back()->with('error', 'Sorry current password is wrong!!!');
    }
    if (strcmp($request->get('oldpassword'), $request->get('password')) == 0) {
        return redirect()->back()->with('error', 'Sorry new password cannot be the same with current password!!!');
    }
    $password = Hash::make($request->password);
    User::findOrfail(Auth::user()->id)->update([
        'password' => $password
    ]);
   

    Auth::logout();
    return redirect()->route('login')->with('success', 'Password changed successfully, please re-login to continue');
}

// Addmin management
 public function adminmanagement(){
     $admins = User::where('role', 'admin')->orderBy('id', 'desc')->get();
     return view('admin/admin/manage_admin', compact(['admins']));
 }

 // Add Admin
 public function addadmin(){
     //
 }

}
