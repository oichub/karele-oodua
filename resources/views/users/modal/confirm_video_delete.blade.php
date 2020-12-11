@extends('users.modal.modal')
@section('title', $video->title)

@section('content')
<h3>Are you sure you want delete</h3>

<div class="card card-dark card-outline">
    <div class="card-body">
        <video controls width="100%">
            <source src="{{ url($video->file->video) }}" type="video/mp4">
            {{--  <source src="{{ asset('videos/oicvideo.mp4') }}" type="video/mp4">  --}}
            Your browser does not support HTML5 video.
          </video>

    </div>
    <h3 class="card-title">{{ $video->title }}</h3>
    <div class="card-footer">
        <small class="text-right py-1 font-weight-bold">{{ $video->created_at }}</small>

        <div class="container py-1">
        <div class="row">
              <div class="col">
            <button type="button" class="btn btn-info">
                Subscriber <span class="badge badge-danger">4</span>
              </button>
            </div>
              <div class="col">
              <button type="button" class="btn btn-primary">
                Watch <span class="badge badge-danger">4</span>
              </button>
            </div>
        </div>
        </div>
        <div class="row">

            <div class="col">
                <a href="{{ url($video->file->video) }}" target="_blank" class="btn btn-sm btn-primary btn-block">Watch</a>
            </div>
            <div class="col">
                <form action="{{ route('videos.destroy', $video->id) }}" method="post">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-sm btn-danger btn-block btn-lg">Delete</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
