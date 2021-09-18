<?php

namespace App\Http\Controllers\users;

use App\Plan;
use App\User;
use App\Video;
use App\Account;
use Carbon\Carbon;
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
       
        $user  = User::where('id', Auth::user()->id)->firstOrFail();
        $videos = Video::get();
        $recentvideos = Video::where('created_at', '<', now())->paginate(5);  
        $lastvideo = Video::latest()->first();          
        if($livevideo  = Video::where('created_at', now())->first()){
            return view('users.user.index', compact(['user', 'livevideo','recentvideos']));
        }
        //$upcoming = count($videos);
       // $recentsub = Subscriber::with(['user', 'video'])->orderBy('id', 'desc')->where(['user_id'=>Auth::user()->id])->limit(10)->get();
        //$allsub = Subscriber::with(['user', 'video'])->orderBy('id', 'desc')->where(['user_id'=>Auth::user()->id])->get();
    //    return $subscribed;
        $livevideo = $lastvideo;
        return view('users.user.index', compact(['user', 'recentvideos', 'livevideo']));
    }

    public function profile()
    {            
        $user  = User::where('id', Auth::user()->id)->firstOrFail();             
        return view('users.user.profile', compact(['user']));
    }
    public function subscription()
    {   
        
        $plans= Plan::orderBy('name', 'desc')->get();
        $present = Carbon::now();        
        if($check = subscriber::where('user_id', Auth::user()->id)->where('status', 'active')->where('end_date', '>', $present)->first()){
            $end = $check->end_date;
            $status = $check->status;    
            if($status == 'active' and $present<$end){
                return redirect()->route('usersdashboard')->with('error', 'Sorry you still have an active subscription');
            }              
            return view('users.user.account.subscribe', compact(['plans']));
        }return view('users.user.account.subscribe', compact(['plans']));
        
    }
    public function subscribe(Request $request)    
    {   
        $plan = $request->plan;
        $amount = Plan::where('name', $plan)->firstOrFail();
        $price = $amount->price;    
        $dt = Carbon::now();        
        $end_date = $dt->addyear(1);
        
        $bal = User::where('id', Auth::user()->id)->firstOrFail();
        $balance = $bal->balance;
        if($balance < $price){
            return redirect()->back()->with('error', 'Sorry you dont have sufficient balance, please fund your account and try again');
        }

        $newbal = $balance - $price;            
        Subscriber::create([
            'user_id' => Auth::user()->id,
            'amount' => $price,
            'plan' => $plan,
            'status' => 'active',
            'end_date' => $end_date,
        ]);
        User::where('id', Auth::user()->id)->update([
            'balance' => $newbal,
        ]);
        return redirect('/users/user/subscribe')->withSuccess('You have successfully subscribed to our videos');
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
