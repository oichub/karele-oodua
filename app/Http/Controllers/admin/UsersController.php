<?php

namespace App\Http\Controllers\admin;

use App\Account;
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
        $user->status = "active";
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
    public function show($slug)
    {
        //
        $user = User::where('slug', $slug)->firstOrFail();  
        $user_id = $user->id;              
        $historys  = Account::where('user_id', $user_id)->get();    
        return view('admin.users.users_details', compact(['user', 'historys']));
    }

    public function pending(){        
         //
         $pending_users  = User::where('role', 'user')->where('status', 'pending')->get();
         // return $users;
         return view('admin.users.pending_users', compact(['pending_users']));
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
    public function update(Request $request, $slug)
    {
        $input= $request->all();
        $status = 'active';
        $input['status'] = $status;       
        User::where('slug', $slug)->first()->update($input);        
        return redirect()->back()->with('success', "User activated successfully");
        
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {                     
        User::findOrfail($id)->forceDelete();
        return redirect()->back()->with('success', "User details deleted successfully");
    }
}
