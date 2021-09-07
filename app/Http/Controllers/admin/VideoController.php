<?php

namespace App\Http\Controllers\admin;

use App\File;
use App\Video;
use Illuminate\Http\Request;
use Vimeo\Laravel\VimeoManager;
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
     public function livevideo(){

        return "Working";
         
     }
     public function uploadvideo(){

        return view('admin.video.add_video');
         
     }

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
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, VimeoManager $vimeo)
    {
        /*$this->validate(
            $request, 
        [
            'title' => 'required|string',
            'description' => 'required|string',
           //'video' => 'required|video',
        ],
        
        [
            'title.required' => 'Please provide video title',
            'description.required' => 'Please provide the video\'s description',
            'video.required' => 'Please upload a  video',
            //'video.mimes' => 'Must be a video format(mp4, mkv, 3gp)',
        ]);*/

        return $request->video;
        
    $url= $vimeo->upload($request->video,
      [
          'name'=> $request->title,
          'description' => $request->description
      ]
      );
return $url;

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
