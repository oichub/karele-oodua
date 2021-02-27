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
        $videos = Video::with(['file', 'user'])->orderBy('id', 'desc')->get();
        // return $video;
        return view('admin.video.manage_video', compact(['videos']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmVideoDelete(Request $request){
        $id = $request->delete;
        $video = Video::with(['file'])->where('id', $id)->firstOrFail();
        return view('modal.confirm_video_delete', compact(['video']));
    }
    public function create()
    {
        //
        return view('admin.video.add_video');
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
        $video->price = $request->price;
        $video->slug = strtolower(str_replace(" ", "-",$videotitle)."-". time());
        $video->user_id = Auth::user()->id;
        $video->save();
        return redirect()->route('videos.index')->with('success', 'New video added successfully');
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
        $video = Video::with(['file'])->where('id', $id)->firstOrFail();
        $file = File::where('id', $video->file->id)->firstOrFail();
        unlink(\public_path().$video->file->video);
        $file->forceDelete();
        $video->forceDelete();
        return redirect()->back()->with('success', $video->title." deleted successfully");

    }
}
