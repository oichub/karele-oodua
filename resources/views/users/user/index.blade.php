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
            <section class="col-lg-7 connectedSortable">
            <div class="class">
                  <!--------Live Video------------->
                @if($livevideo)    
                    {!! $livevideo->embeded!!}                      
                @endif
                
                <!--------Live Video------------->
            </div>
            </section>
            <div class="col-lg-5 connectedSortable">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title" style="font-weight:bold">RECENT VIDEOS</h3>                
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                    @foreach($recentvideos as $recentvideo)
                    <li class="item">
                    <div class="product-img">
                        <img src="" alt="video Image" class="img-size-50">
                    </div>
                    <div class="product-info">                        
                        <span class="product-description">
                        {{$recentvideo->title}} 
                        </span>
                    </div>
                    </li>
                   
                    @endforeach                    
                </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    <a href="{{route('previousvideos.index')}}" class="uppercase">View All Videos</a>
                </div>
                <!-- /.card-footer -->
            </div>
            </div>
        </div>
        
</section>
<!-- /.content -->
@endsection
