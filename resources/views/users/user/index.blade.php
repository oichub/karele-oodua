@extends('layouts.users.userlayout')
@section('title', "User Dashboard")
@section('content')
<!-- Info boxes -->
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
        <!-- &#8358; -->
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa">$</i></span>

            <div class="info-box-content">
                <span class="info-box-text">Balance</span>
                <span class="info-box-number">
                      ${{$user->balance}}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Subscribed Video</span>
                <span class="info-box-number">2</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!----- fix for small devices only ----->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-video"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Incoming Event</span>
                <span class="info-box-number">56</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-bell"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Notification</span>
                <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
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
        <div class="row">
            <div class="col-md-5">

                <!-- /.card -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">


                        <h3 class="profile-username text-center text-uppercase">upcoming event</h3>

                        {{-- <p class="text-muted text-center">Software Engineer</p>  --}}

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Title </b> <a class="float-right">Price</a>
                            </li>
                            @php/*
                            function checkSub($user, $video){
                            $subscri = App\Subscriber::where(['user_id'=>$user,'video_id'=>$video])->get();
                            return count($subscri);
                            } */
                            @endphp
                        
                            <li class="list-group-item">
                                <b>class="text-uppercase">ggkggmm mg</b>
                                        
                                    <span class="ml-3 text-danger">Subscribed <span
                                            class="ml-2 fab fa-youtube"></span></span></a>
                        
                                <a class="float-right"><i class="fa fa">&#8358;</i>#4555</a>
                            </li>
                           
                        </ul>

                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <!-- /.col -->
            <div class="col-md-7">
                <div id="subscribe">
                    <div class="card collapse show" id="recentsub" data-parent="#subscribe">
                        <div class="card-header">
                            <h3 class="card-title">SUBSCRIBED VIDEO</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body p-0">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                @php
                                $userlogin = Auth::user()->id;
                                @endphp
                              


                                <li class="item">
                                    {{-- <div class="product-img">
                            <img src="" alt="Product Image" class="img-size-50">
                          </div> --}}
                                    <div class="product-info">
                                            class="product-title"> Ade
                                            {{-- <span class="product-description">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. sapiente doloribus ullam ab..
                            </span> --}}
                                    </div>
                                </li>
                                

                            </ul>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="#totalsub" class="text-uppercase" data-toggle="collapse">View All videos</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                    <div class="card collapse" id="totalsub" data-parent="#subscribe">
                        <div class="card-header">
                            <h3 class="card-title">SUBSCRIBED VIDEO</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body p-0">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                @php
                                $userlogin = Auth::user()->id;
                                @endphp
                                <li class="item">
                                    {{-- <div class="product-img">
                            <img src="" alt="Product Image" class="img-size-50">
                          </div> --}}
                                    <div class="product-info">
                                             class="product-title"> Asde
                                            {{-- <span class="product-description">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. sapiente doloribus ullam ab..
                            </span> --}}
                                    </div>
                                </li>
                               

                            </ul>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="#recentsub" class="text-uppercase" data-toggle="collapse">View Less videos</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
