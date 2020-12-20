@extends('layouts.users.userlayout')
@section('title', "USER DASHBOARD")
@section('content')


   <!-- Info boxes -->
   <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fa fa">&#8358;</i></span>

        <div class="info-box-content">
          <span class="info-box-text">Account Balance</span>
          <span class="info-box-number">
              {{ $user->balance }}
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
          <span class="info-box-number">{{ $user->totalsub }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-video"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Incoming Event</span>
          <span class="info-box-number">{{ $upcoming }}</span>
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
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong style="font-size:15px;">Success :{{session('success') }}</strong><br/>
            </div>
            @endif
          <div class="row">
            <div class="col-md-5">

              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">


                  <h3 class="profile-username text-center">{{ $user->name }}</h3>

                  {{--  <p class="text-muted text-center">Software Engineer</p>  --}}

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>phone Number</b> <a class="float-right">{{ $user->phone }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Country</b> <a class="float-right">{{ $user->country }}</a>
                    </li>
                  </ul>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">


                  <h3 class="profile-username text-center text-uppercase">upcoming event</h3>

                  {{--  <p class="text-muted text-center">Software Engineer</p>  --}}

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Title </b>  <a class="float-right">Price</a>
                      </li>
                      @php
                          function checkSub($user, $video){
                            $subscri = App\Subscriber::where(['user_id'=>$user,'video_id'=>$video])->get();
                            return count($subscri);
                          }
                      @endphp
                      @foreach ($videos as $video)


                    <li class="list-group-item">
                      <a href="{{ route('video.show', $video->slug) }}"><b class="text-uppercase">{{ $video->title }}</b>
                        @if (checkSub(Auth::user()->id, $video->id))
                            <span class="ml-3 text-danger">Subscribed <span class="ml-2 fab fa-youtube"></span></span></a>
                        @else
                        @endif
                        <a class="float-right"><i class="fa fa">&#8358;</i>{{ $video->price }}</a>
                    </li>
                    @endforeach
                  </ul>

                </div>
                <!-- /.card-body -->
              </div>

            </div>
            <!-- /.col -->
            <div class="col-md-7">
                <div class="card">
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
                          @foreach ($subscribed as $sub)


                        <li class="item">
                          {{-- <div class="product-img">
                            <img src="" alt="Product Image" class="img-size-50">
                          </div> --}}
                          <div class="product-info">
                            <a href="{{ route('subscribed_videos', ['userid'=> $userlogin, 'videoid'=>$sub->video_id,'subid'=>$sub->id, 'video'=>$sub->video->slug]) }}" class="product-title">{{ strtoupper($sub->video->title) }}
                            {{-- <span class="product-description">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. sapiente doloribus ullam ab..
                            </span> --}}
                          </div>
                        </li>
                         @endforeach

                      </ul>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                      <a href="javascript:void(0)" class="uppercase">View All Products</a>
                    </div>
                    <!-- /.card-footer -->
                  </div>
              <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection

