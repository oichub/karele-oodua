@extends('layouts.users.userlayout')
@section('title', "VIEW ".strtoupper($video->title))
@section('content')
<div class="container">
    <h2 class="text-center font-weight-bold">{{ strtoupper($video->title) }}</h2>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
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
                        <button type="button" class="btn btn-info btn-block btn-lg">
                            Subscriber <span class="badge badge-danger">{{ $video->totalsubscriber }}</span>
                          </button>
                        </div>
                          <div class="col">
                              @if ($substatus)
                              <a href="#subscribed" data-toggle="modal" subscribed ="{{ $video->id }}" class="btn btn-danger disabled  btn-block btn-lg">
                                <span class="ml-3">Subscribed <span class="ml-2 fab fa-youtube"></span></span></a>
                            </a>
                              @else
                             <a href="#subscribe" data-toggle="modal" subscribe ="{{ $video->id }}" class="btn btn-primary  btn-block btn-lg">
                            Subscribe Now
                          </a>
                              @endif

                        </div>
                    </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<div id="subscribe" class="modal"></div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
    $('#subscribe').on('show.bs.modal', function(e){
      var id = $(e.relatedTarget).attr('subscribe');

    //   alert(id);
      $.ajax({
        type:'post',
        headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
        url:'{{route('confirm_subscription')}}',
        data:'subscribed='+id,
        success:function(data){
          $('#subscribe').html(data);
        }
      })
    })
  })
    </script>
@endsection
