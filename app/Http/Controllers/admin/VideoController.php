<?php

namespace App\Http\Controllers\admin;

use App\File;
use App\Video;
use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('users.admin.video.manage_video');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.admin.video.add_video');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        //
        $video = new Video();
        $videotitle = $request->title;
        $videodate = $request->date;
        $videofile = $request->file('video');
        $file = new File();
        $ext = $videofile->getClientOriginalExtension();
        $filename = strtolower(str_replace(" ", "_",$videotitle)."_". time()).".".$ext;
        $videofile->move('videos/', $filename);
        $file->video = $filename;
        $file->save();
        $video->title = $videotitle;
        $video->file_id = $file->id;
        $video->date = $videodate;
        $video->slug = strtolower(str_replace(" ", "-",$videotitle)."-". time());
        $video->user_id = Auth::user()->id;
        $video->save();
        return redirect()->back()->with('success', 'New video added successfully');





        return $request->all();
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
