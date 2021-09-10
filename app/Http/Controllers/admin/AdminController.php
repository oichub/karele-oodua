<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Admin;
use App\Event;
use App\Video;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePassword;

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
        $livevideo= Event::first();
        return view('admin.index', compact(['totaluser', 'totalsub', 'totalvideo', 'totalrevenue', 'livevideo']));
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
 public function addadmin(Request $request){
    $this->validate(
        $request, 
        [
            'name' => 'required | string',
            'email' => 'required | email |max:255 |unique:users,email',
            'phone' => 'required |numeric|unique:users,phone',
        ],
        [
            'name.required' => 'Admin name is required',
            'name.string' => 'Invalid name',
            'email.required' => 'Email is required',
            'email.max' => 'Invalid email',
            'email.unique' => 'Email already exist',
            'phone.required' => 'Phone number is required',
            'phone.numeric' => 'Invalid number',
            'Phone.unique' => "Phone number already exist"
        ]
    );
    function createRandomPassword() {
        $chars = "0123456789012345678901234567890123456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
        while ($i <= 5) {

            $num = rand() % 33;

            $tmp = substr($chars, $num, 1);

            $pass = $pass . $tmp;

            $i++;

        }
        return $pass;
    }
    $slu=$request->name."-".createRandomPassword();
    $slug= strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slu), '-'));
$admin = new User;
$admin->name = $request->name; 
$admin->email = $request->email; 
$admin->phone= $request->phone; 
$admin->slug= $slug; 
$admin->role= 'admin';
$admin->password= Hash::make($request->phone);
$admin->email_verified_at=now();
$admin->save();
/*Mail::send('welcome_email',$request->email, function ($message) use ($email_data){
    $message->to($request->email, $request->name, $request->phone)
    ->subject('Welcome to Karele Oodua Lafefe')
    ->from('notreply@kareleoodualafefe.com', 'Karele Oodua Lafefe');
}); */
return redirect()->back()->with('success', 'New admin has been added successfully');

 }
 public function updateadmin(Request $request){
    // $slug = User::findOrFail($request->slug);
  User::where('slug', $request->slug)
  ->update(['name'=> $request->name, 'email'=> $request->email, 'phone' => $request->phone]);
  return redirect()->back()->with('success', 'Admin details has been updated successfully');

}
public function deleteadmin(Request $request){
    if(User::where('slug', $request->addmin_slug)
    ->forceDelete()){
    return redirect()->back()->with('success', 'Admin name has been deleted successfully');
}
}
}
