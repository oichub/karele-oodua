<?php

namespace App\Http\Controllers\users;

use App\User;
use App\Video;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $subscribed = Subscriber::with(['user', 'video'])->where(['user_id'=>Auth::user()->id])->get();
    //    return $subscribed;
        return view('users.user.index', compact(['user', 'upcoming', 'videos','subscribed']));
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
        //
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
