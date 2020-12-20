<?php

namespace App\Http\Controllers\users;

use App\User;
use App\Video;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
public function subscriber($userid, $videoid, $subid,  $slug ){
    $sub = Subscriber::where(['user_id'=>$userid, 'video_id'=>$videoid, 'id'=>$subid ])->with(['user', 'video'])->firstOrFail();

    return view('users.user.videos.watch_video', compact(['sub']));
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
        $subscribe = new Subscriber();
        $subscribe->user_id = Auth::user()->id;
        $subscribe->video_id = $request->subscribedid;
        $video = Video::where('id', $request->subscribedid)->firstOrFail();
        $video->totalsubscriber +=1;
        $video->update();
        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $user->totalsub +=1;
        $user->balance -=$video->price;
        $user->update();
        $subscribe->amount= $video->price;
        $subscribe->save();
        return redirect()->route('usersdashboard')->with('success', 'Congratulation, you have successfully subscribed to '. $video->title);
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
