@extends('pages.app')
@section('style')
@endsection
@section('title', 'Home')
@section('content') 
    <section class="w3l-main-slider" id="home">
        <div class="banner-content">
            <div id="demo-1"
                data-zs-src='["{{asset('pages/image/banner4.jpg')}}", "{{ asset('pages/image/banner2.jpg') }}"," {{ asset('pages/image/banner1.jpg') }}", "{{ asset('pages/image/banner3.jpg') }}", "{{ asset('pages/image/banner4.jpg') }}"]'
                data-zs-overlay="dots">
                <div class="demo-inner-content">
                    <div class="container">
                        <div class="banner-infhny">
                            <!-- fireworks effect -->
                            <div class="pyro">
                                <div class="before"></div>
                                <div class="after"></div>
                            </div>
                            <!-- first text effect -->
                            <section>
                                <div id="Text8">
                                    <h1>
                                        <span>I</span>
                                        <span>t</span>
                                        <span>'</span>
                                        <span>s</span>
                                        <span> </span>
                                        <span>T</span>
                                        <span>i</span>
                                        <span>m</span>
                                        <span>e</span>
                                        <span> </span>
                                        <span>T</span>
                                        <span>o</span>
                                        <span> </span>
                                        <span>C</span>
                                        <span>e</span>
                                        <span>l</span>
                                        <span>e</span>
                                        <span>b</span>
                                        <span>r</span>
                                        <span>a</span>
                                        <span>t</span>
                                        <span>e</span>
                                    </h1>
                                   
                                </div>
                                
                            </section>
                            <br/>
                            <br/>
                            <!-- new year effect -->
                        
                                     <h1 style="margin-top:50px;letter-spacing:3px;color:white"> <span style="color:#fb6049;">Our </span> Heritage</h1>
                            <div class="pyro pyro-2 position-relative">
                                <div class="before"></div>
                                <div class="after"></div>
                            </div>
                            
                            <!-- fireworks effect -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //banner section -->
    <!-- blog section -->
    <div class="blog-section py-5">
        <div class="container py-md-5 py-4">
              <div class="waviy text-center mb-md-5 mb-4">
                <span style="--i:1">O</span>
                <span style="--i:2">u</span>
                <span style="--i:3">r</span>
               <span style="--i:4"></span>
                <span style="--i:5">U</span>
                <span style="--i:6">p</span>
                <span style="--i:7">c</span>
                <span style="--i:8">o</span>
                <span style="--i:1">m</span>
                <span style="--i:2">m</span>
                 <span style="--i:2">i</span>
                  <span style="--i:2">n</span>
                   <span style="--i:2">g</span>
                <span style="--i:3"></span>
                <span style="--i:4">E</span>
                <span style="--i:5">v</span>
                <span style="--i:6">e</span>
                <span style="--i:7">n</span>
                <span style="--i:8">t</span>
                <span style="--i:9">s</span>
            </div>
         <div class="row">
              <!-----//--EVent from database------->
              @foreach ($events as $event)
              @php
              $event_picture=$event->demo_file ? $event->demo_file->name : "Not available";
              @endphp
                <div class="col-lg-4 col-md-6 item">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="#single">
                                <img class="card-img-bottom d-block radius-image-full" src="{{asset( $event_picture)}}"
                                    alt="Card image cap">
                            </a>
                        </div>
                        <div class="card-body blog-details">
                            <span class="label-blue">{{$event->name}}</span>
                            <a href="#single" class="blog-desc">{{$event->description}}
                            </a>
                            <div class="author align-items-center mt-3 mb-1">
                                <img src="pages/assets/images/testi1.jpg" alt="" class="img-fluid rounded-circle" />
                                <ul class="blog-meta">
                                    <li>
                                        <a href="#single">Isabella ava</a> </a>
                                    </li>
                                    <li class="meta-item blog-lesson">
                                        <span class="meta-value"> Jan 28 2021 </span>. <span
                                            class="meta-value ml-2"><span class="fa fa-clock-o"></span> 1 min</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-----//--EVent from database------->
                {{ $events->links() }}
            </div>
               </div>
    </div>
    <!-- //blog section -->
@endsection
@section('script')
@endsection
