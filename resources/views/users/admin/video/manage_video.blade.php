@extends('layouts.admin.adminlayout')
@section('title', "MANAGED VIDEOS")
@section('content')
<h3 class="font-weight-bold text-uppercase text-center py-3">Manage videos</h3>
<div class="container">
    @php
        $start = 1;
        $end = 12;
    @endphp
    <div class="row">

        @for ($i = $start; $i < $end; $i++)
<div class="col-md-4">
    <div class="card card-dark card-outline">
        <div class="card-body">
            <video controls width="100%">
                <source src="{{ asset('videos/oicvideo.mp4') }}" type="video/mp4">
                {{--  <source src="{{ asset('videos/oicvideo.mp4') }}" type="video/mp4">  --}}
                Your browser does not support HTML5 video.
              </video>

        </div>
        <h3 class="card-title">Title</h3>
        <div class="card-footer">
            <div class="container py-2">


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
                    <a href="" class="btn btn-sm btn-primary btn-block">Watch</a>
                </div>
                <div class="col">
                    <a href="" class="btn btn-sm btn-danger btn-block">Delete</a>
                </div>
            </div>
        </div>

    </div>
</div>

        @endfor
    </div>
</div>
@endsection

@section('script')

@endsection

