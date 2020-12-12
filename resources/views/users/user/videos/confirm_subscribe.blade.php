@extends('users.modal.modal')
@section('title', $video->title)

@section('content')
<h3>Are you sure you want subscribe</h3>

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
                Subscriber <span class="badge badge-danger">{{ $video->totalsubscriber }}</span>
              </button>
            </div>
              <div class="col">
              <form action="{{ route('usersubscribed.store') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden"  value="{{ $video->id }}" name="subscribedid">
                    <button type="submit" class="btn btn-danger btn-block btn-lg">Subscribe</button>
                </form>
            </div>
        </div>
        </div>

    </div>

</div>
@endsection
