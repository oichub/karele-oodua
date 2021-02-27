@extends('admin.adminlayout')
@section('title', "Manage Video")
@section('content')
<h3 class="font-weight-bold text-uppercase text-center py-3">Manage videos</h3>
<div class="container">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong style="font-size:15px;">Success :{{session('success') }}</strong><br/>
    </div>
    @endif
    @if (count($videos) > 0)


    <div class="row">
@foreach ($videos as $video)


<div class="col-md-4">
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
                    <a href="#delete" data-toggle="modal" delete="{{ $video->id }}" class="btn btn-sm btn-danger btn-block">Delete</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endforeach
    </div>
    @else
<h3 class="text-center font-weight-bold text-uppercase text-danger">No video available</h3>
    @endif
</div>
<div id="delete" class="modal"></div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
    $('#delete').on('show.bs.modal', function(e){
      var id = $(e.relatedTarget).attr('delete');

      // alert(id);
      $.ajax({
        type:'post',
        headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
        url:'{{route('confirmVideoDelete')}}',
        data:'delete='+id,
        success:function(data){
          $('#delete').html(data);
        }
      })
    })
  })
    </script>
@endsection

