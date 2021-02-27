<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Video;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsersRegistartionRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users  = User::where('role', 'user')->get();
        // return $users;
        return view('admin.users.manage_users', compact(['users']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRegistartionRequest $request)
    {
        //

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->role ="user";
        $user->slug =strtolower(str_replace(" ", "-", $request->name)).time();
        $user->totalsub = 0;
        $user->balance =0.00;
        $user->password = Hash::make($request->phone);
        $user->save();
        return redirect()->back()->with('success', "New user added successfully");
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
        $user = User::where('slug', $id)->firstOrFail();
        $videos  = Video::where('date', '>', now())->get();
        $upcoming = count($videos);
        $recentsub = Subscriber::with(['user', 'video'])->orderBy('id', 'desc')->where(['user_id'=>$user->id])->limit(10)->get();
        $allsub = Subscriber::with(['user', 'video'])->orderBy('id', 'desc')->where(['user_id'=>$user->id])->get();
    //    return $subscribed;
        return view('users.admin.users.users_details', compact(['user', 'upcoming', 'videos','recentsub', 'allsub']));
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
        return view('admin.users.update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
