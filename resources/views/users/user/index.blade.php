@extends('layouts.users.userlayout')
@section('title', "User Dashboard")
@section('style')
<link rel="stylesheet" href="{{asset('style.css') }}">
@endsection
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid mt-2">
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong style="font-size:15px;">Error: {{session('error') }}</strong><br />           
        </div>
        @endif 
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong style="font-size:15px;">Success :{{session('success') }}</strong><br />
        </div>
        @endif


        @if($errors->any())
        {{-- {{ dd($errors) }} --}}
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong style="font-size:20px;">Oops!
                {{ "Kindly rectify below errors" }}</strong><br />
            @foreach ($errors->all() as $error)
            {{$error }} <br />
            @endforeach
        </div>
        @endif
        @if($livevideo || $recentvideos)        
        <div class="card">     
            <div class="card-header">
                <div class="card-title">
                @php
                if($livevideo->date == date('Y-m-d') and $livevideo->time == date('h:i')){
                    echo "Live video";
                }elseif($livevideo->date >= date('Y-m-d') and $livevideo->time > date('h:i')){
                    echo "Upcoming Event";
                }else{
                    echo "Recent Events";
                }
                @endphp 
            </div>               
            </div>   
        <div class="contained">
            <div class="main-video">
            <div class="video">
                <iframe src="{{$livevideo->url}}" frameborder="0" width="640" height="360" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                <h3 class="title"> {{$livevideo->title}}</h3>        
            </div>
            </div>
            <div class="video-list">
            @foreach($recentvideos as $recentvideo)
            <div class="vid active">
                <iframe src="{{$recentvideo->url}}"></iframe>
                <h3 class="title">{{$recentvideo->title}}</h3>      
            </div>    
            @endforeach <div class="card-footer text-center">
                    <a href="{{route('previousvideos.index')}}" class="uppercase">View All Videos</a>
            </div>
            </div>
        </div>
        </div>
        @else
        <marquee behavior="" direction="left" class="text-bold text-danger"> Sorry you haven't subscribed to any watch any of our videos, kindly subscribe to watch now.</marquee>
        @endif
</section>
<!-- /.content -->
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
