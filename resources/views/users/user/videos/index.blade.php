@extends('layouts.users.userlayout')
@section('title', 'Previous Video')
@section('style')
<link rel="stylesheet" href="{{asset('style.css') }}">
<style>
.gallery{
  border: 1px transparent solid;  
  /* padding: 50px; */
  margin-top: 20px;
  padding-left: 5px;
  position: relative;  
}
.gallery .play{
   position: absolute;
   top: 40%;
   left: 50%;
   transform: translate(-50%, -50%);
   -webkit-transform: translate(-50%, -50%);
   background-color: #555;   
   font-size:16px;
   padding: 12px 18px;
   border: none;
   color: #fff;
   cursor: pointer;
   opacity: .8;
   border-radius: 20px;   
}
.gallery .play:hover{
  background-color: #ff4c4c;
  /* padding: 10px; */
}
.text{
  font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  margin-top: 5px;
  padding: 0px 10px 0px 0px;
  color: black;
}

h1{
  padding-left:10px;
  font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}

</style>
@endsection
@section('content')


<div>
<h1>Videos</h1>
<!-- <form class="float-right mt-2">
  <input type="text" name="search" placeholder="Search..">
</form> -->
</div>
<h5 style="padding-left: 10px; font-family:serif;">Don't miss out any of our event videos, watch our previous videos and look forward to our upcoming events. </h5>
<div class="card mt-2 px-2">
  <div class="card-header" >   
    <h3 class="card-title"> Upcoming Events</h3>
  </div>
  <div class="row pt-3" >  
    <div class="col-md-3 gallery">
      <a href="#" target="_parent">
        <img src="{{asset('videos/video.PNG')}}" alt="" style=" width:100%; height: auto">
        <span class="play"><i class="fa fa-play"></i></span>
        <div class="text">
          <h5 class="float-left">OSTraining Event</h5> <i class="float-right">tomorrow</i>
          <p style="clear:both"> Description of the video </p>
        </div>
      </a>
    </div>
    <div class="col-md-3 gallery">
      <!-- <a href="{{asset('videos/oicvideo.mp4')}}" target="_parent"> -->
        <img src="{{asset('videos/video2.PNG')}}" alt="" style=" width:100%; height: auto">
        <span class="play"><i class="fa fa-play"></i></span>
        <div class="text">
        <h5 class="float-left">OICTraining Event</h5> <i class="float-right">saturday</i>
          <p style="clear:both"> Description of the video </p>
        </div>
      <!-- </a> -->
    </div>
    <div class="col-md-3 gallery ">
      <!-- <a href="{{asset('videos/wordpress_1607771314.mp4')}}" target="_parent"> -->
        <img src="{{asset('videos/video.PNG')}}" alt="" style=" width:100%; height: auto">
        <span class="play"><i class="fa fa-play"></i></span>
        <div class="text">
        <h5 class="float-left">OSTraining Event</h5> <i class="float-right">{{date('12-10-21')}}</i>
          <p style="clear:both"> Description of the video </p>
        </div>
      <!-- </a> -->
    </div>
    <div class="col-md-3 gallery">
      <a href="#">
        <img src="{{asset('videos/video2.PNG')}}" alt="" style=" width:100%; height: auto">
        <span class="play"><i class="fa fa-play"></i></span>
        <div class="text">
        <h5 class="float-left">OSTraining Event</h5> <i class="float-right">5hours ago</i>
          <p style="clear:both"> Description of the video </p>      
        </div>
      </a>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <div class="card-title">
  <h4 class="heading">Previous Videos</h4></div>
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
