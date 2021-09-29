<?php

namespace App\Http\Controllers\users;

use App\User;
use App\Video;
use Carbon\Carbon;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $present = Carbon::now();  
        $user = User::where('id', Auth::user()->id)->firstOrFail();
        if($check = subscriber::where('user_id', Auth::user()->id)->where('status', 'active')->where('end_date', '>', $present)->first()){
            $end = $check->end_date;
            $status = $check->status;    
            if($status == 'active' and $present<$end){
                $latestvideo = Video::latest()->first();
                $recentvideos = Video::where('created_at', '<', now())->get();
               return view('users.user.videos.index', compact(['recentvideos', 'latestvideo', 'user']));
            }              
            return redirect()->route('usersdashboard')->with('error', 'Sorry your subscription is expired, Please again subscribe to watch our videos');          
        }       
        return redirect()->route('usersdashboard')->with('error', 'Sorry you dont have any active subscription, Please subscribe to watch our videos');          
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $latestvideo = Video::latest()->first();
        $user = User::where('id', Auth::user()->id)->firstOrFail();
        $recentvideos = Video::where([
            ['title', '!=', Null],
            [function($query) use($request) {
                if (($search = $request->search)){
                    $query->orwhere('title', 'like', '%' .$search. '%')->get();
                }
            }]
        ])->orderby('id', 'desc')->get();

        return view('users.user.videos.index', compact(['recentvideos', 'latestvideo', 'user']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function livevideo()
    // {
    //     //
    //     $present = Carbon::now();        
    //     if($check = subscriber::where('user_id', Auth::user()->id)->where('status', 'active')->where('end_date', '>', $present)->first()){
    //         $end = $check->end_date;
    //         $status = $check->status;    
    //         if($status == 'active' and $present<$end){
    //             return redirect(asset('videos/oicvideo.mp4'));
    //         }              
    //         return redirect()->route('usersdashboard')->with('error', 'Sorry your subscription is expired, Please again subscribe to watch our videos');          
    //     }       
    //     return redirect()->route('usersdashboard')->with('error', 'Sorry you dont have any active subscription, Please subscribe to watch our videos');          
        
        
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $video = Video::with(['file'])->where('slug', $id)->firstOrFail();
        $sub = Subscriber::where(['user_id'=>Auth::user()->id, 'video_id' => $video->id])->get();
        $substatus = count($sub);
        return view('users.user.videos.view_video', compact(['video', 'substatus']));
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
public function confirm_subscription(Request $request){
            $video = Video::where('id', $request->subscribed)->firstOrFail();
            return view('users.user.videos.confirm_subscribe', compact(['video']));
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
