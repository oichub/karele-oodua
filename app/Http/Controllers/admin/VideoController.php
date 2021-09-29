<?php

namespace App\Http\Controllers\admin;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function livevideo()
    {

        return "Working";
    }
    public function uploadvideo()
    {

        return view('admin.video.add_video');
    }

    public function index()
    {
        //
        $videos = Video::with(['user'])->orderBy('id', 'desc')->get();
        // return $video;
        return view('admin.video.manage_video', compact(['videos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmVideoDelete(Request $request)
    {

        $id = $request->delete;
        $video = Video::with(['file'])->where('id', $id)->firstOrFail();
        return view('modal.confirm_video_delete', compact(['video']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required|string|unique:videos,title',
                'url' => 'required',
            ],

            [
                'title.required' => 'Please provide video title',
                'url.required' => 'URL is required'
            ]
        );
        $video = new Video;
        $video->title = $request->title;
        $video->url = $request->url;
        $video->user_id = Auth::user()->id;
        $video->slug = str_replace(" ", "-", strtolower($request->title) . "-" . time());
        $video->save();
        return redirect()->back()->with('success', 'Video has been successfully uploaded');
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
        Video::where('slug', $request->slug)
            ->update(['url' => $request->url, 'title' => $request->title]);
        return redirect()->back()->with('success', 'Video has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Video::where('id', $id)->delete();
        return redirect()->back()->with('success', " Video deleted successfully");
    }
}
