<?php

namespace App\Http\Controllers\users;

use App\User;
use App\Video;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePassword;
use App\Http\Requests\UserUpdateReuest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//   public  function checkSub($user, $video){
//         $subscri = Subscriber::where(['user_id'=>$user,'video_id'=>$video])->get();
//         return count($subscri);
//       }
    public function index()
    {
        //
        $user  = User::where('id', Auth::user()->id)->firstOrFail();
        $videos  = Video::where('date', '>', now())->get();
        $upcoming = count($videos);
        $recentsub = Subscriber::with(['user', 'video'])->orderBy('id', 'desc')->where(['user_id'=>Auth::user()->id])->limit(10)->get();
        $allsub = Subscriber::with(['user', 'video'])->orderBy('id', 'desc')->where(['user_id'=>Auth::user()->id])->get();
    //    return $subscribed;
        return view('users.user.index', compact(['user', 'upcoming', 'videos','recentsub', 'allsub']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = new Account();
        $account->amount = $request->amount;
        $account->ref = "karele".time();
        $account->user_id = Auth::user()->id;
        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $user->balance +=$request->amount;
        $user->update();
        $account->save();
        return redirect()->route('usersdashboard')->with('success', 'You have deposit '. $request->amount. ' naira successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
public function gotochangepassword(){
    return view('users.user.change_password');
}

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
    // auth()->logout();
    Auth::logout();
    return redirect()->route('login')->with('success', 'Password changed successfully, please re-login to continue');
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateReuest $request, $id)
    {
        //
        $user = User::where('id', $id)->firstOrFail();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->update();
        return redirect()->back()->with('success', 'Congratulation, you have successfully updated your profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
