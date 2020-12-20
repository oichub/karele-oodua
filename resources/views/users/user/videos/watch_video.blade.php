@extends('layouts.users.userlayout')
@section('title', "WATCH ".strtoupper($sub->video->title))
@section('content')
<div class="container">
    <h2 class="text-center font-weight-bold">{{ strtoupper($sub->video->title) }}</h2>
    <div class="card card-dark card-outline">
        <div class="card-body">
            <video controls width="100%">
                <source src="{{ url($sub->video->file->video) }}" type="video/mp4">
                {{--  <source src="{{ asset('videos/oicvideo.mp4') }}" type="video/mp4">  --}}
                Your browser does not support HTML5 video.
              </video>

        </div>
    </div>
</div>

@endsection


