@extends('layouts.users.userlayout')
@section('title', 'Previous Video')
@section('style')
<link rel="stylesheet" href="{{asset('style.css') }}">
@endsection
@section('content')
<h1>Videos</h1>
<!-- <form class="float-right mt-2">
  <input type="text" name="search" placeholder="Search..">
</form> -->
</div>
<h5 style="padding-left: 10px; font-family:serif;" class="float-left">Don't miss out any of our event videos, watch all our previous videos. </h5>
<a href="{{route('previousvideos.index')}}" class="float-right pr-3 text-danger" >
  <span class="fas fa-sync-alt"></span>
</a>
<div class="card" style="clear:both">
  <div class="card-header">
    <div class="card-title">
      <h4 class="heading float-left">Videos</h4>      
    </div>
      <form action="{{route('previousvideos.create')}}" method="get" class="float-right">
        @csrf
        <div class="input-group ">
          <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
          <div class="input-group-append">
            <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </form>
</div>
  <div class="contained">
    <div class="main-video">
      <div class="video">
        <iframe src="{{$latestvideo->url}}" preload="none" frameborder="0" width="640" height="360" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
        <h3 class="title"> {{$latestvideo->title}}</h3>        
      </div>
    </div>
    <div class="video-list">
    @foreach($recentvideos as $recentvideo)
      <div class="vid active">
        <iframe src="{{$recentvideo->url}}"></iframe>
        <h3 class="title">{{$recentvideo->title}}</h3>      
      </div>    
    @endforeach
    </div>
  </div>
</div>
</body>
@endsection
@section('script')
<script>  
  let listVideo = document.querySelectorAll('.video-list .vid');
  let mainVideo = document.querySelector('.main-video iframe')
  let title = document.querySelector('.main-video .title');
  listVideo.forEach(iframe =>{    
      iframe.onclick = () =>{
        listVideo.forEach(vid => vid.classList.remove('active'));
        iframe.classList.add('active');
        if(iframe.classList.contains('active')){
          let src = iframe.children[0].getAttribute('src');
          mainVideo.src = src;
          let text = iframe.children[1].innerHTML;
          title.innerHTML = text;
        }
     
      }
  });
</script>
@endsection
