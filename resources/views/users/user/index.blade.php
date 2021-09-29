@extends('layouts.users.userlayout')
@section('title', "User Dashboard")
@section('style')
<link rel="stylesheet" href="{{asset('style.css') }}">
@endsection
@section('content')
<section class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Balance</span>
                <span class="info-box-number">{{$user->balance}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-clock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> Plan</span>
                <span class="info-box-number">{{$day_left}} Days Left</span>
                         </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-calendar-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Plan Ending Date</span>
                 <span class="info-box-number">@php echo date("Y-m-d", strtotime($subscriber->end_date))@endphp</span>
              </div>
            </div>
          </div>
        </div>

  </div>
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
            <h5 style="padding-left: 10px; font-family:serif;" class="float-right"></h5>
<a href="{{route('user.index')}}" class="float-right pr-3 text-danger" >
  Refresh Videos
</a>
            <div class="main-video">
            <div class="video">
                <iframe src="{{$livevideo->url}}" frameborder="0" width="100%" height="360" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                {{-- <iframe src="https://vimeo.com/event/1320939/chat/" width="100%" height="100%" frameborder="0"></iframe> --}}
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
        <marquee behavior="" direction="left" class="text-bold text-danger"> Sorry you haven't subscribed to any of our plans.</marquee>
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
