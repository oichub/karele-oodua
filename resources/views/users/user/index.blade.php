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
            10
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
          <span class="info-box-number">41,410</span>
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
          <span class="info-box-number">760</span>
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
          <div class="row">
            <div class="col-md-5">

              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">


                  <h3 class="profile-username text-center">Username</h3>

                  {{--  <p class="text-muted text-center">Software Engineer</p>  --}}

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right">oka@vb.com</a>
                    </li>
                    <li class="list-group-item">
                      <b>phone Number</b> <a class="float-right">29739572</a>
                    </li>
                    <li class="list-group-item">
                      <b>Friends</b> <a class="float-right">13,287</a>
                    </li>
                  </ul>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->


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
                        <li class="item">
                          <div class="product-img">
                            <img src="{{ url('plugins/dist/img/default-150x150.png') }}" alt="Product Image" class="img-size-50">
                          </div>
                          <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">Sam
                            <span class="product-description">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. sapiente doloribus ullam ab..
                            </span>
                          </div>
                        </li>
                        <!-- /.item -->
                        <li class="item">
                          <div class="product-img">
                            <img src="{{ url('plugins/dist/img/default-150x150.png') }}" alt="Product Image" class="img-size-50">
                          </div>
                          <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">Bicycle
                            <span class="product-description">
                              temporibus odio voluptates nemo nisi cupiditate incidunt,
                            </span>
                          </div>
                        </li>
                        <!-- /.item -->
                        <li class="item">
                          <div class="product-img">
                            <img src="{{ url('plugins/dist/img/default-150x150.png') }}" alt="Product Image" class="img-size-50">
                          </div>
                          <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">
                              box One
                            </a>
                            <span class="product-description">
                              Culpa magni hic distinctio facilis libero voluptatum possimus quae quia voluptatib.
                            </span>
                          </div>
                        </li>
                        <!-- /.item -->
                        <li class="item">
                          <div class="product-img">
                            <img src="{{ asset('plugins/dist/img/default-150x150.png') }}" alt="Product sdsImage" class="img-size-50">
                          </div>
                          <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">Play
                             <a>
                            <span class="product-description">
                            Lorem ipsum dolor sit amet..
                            </span>
                          </div>
                        </li>
                        <!-- /.item -->
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

