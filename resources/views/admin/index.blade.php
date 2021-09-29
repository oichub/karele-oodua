@extends('admin.adminlayout')
@section('title', "Admin Dashboard")
@section('content')
 <div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $totaluser }}</h3>
          <p>Active Users</p>
        </div>

        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
        <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $totalsub}}</h3>
          <p>Subscribers</p>
        </div>
        <div class="icon">
          <i class="fa fa-bell"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning ">
        <div class="inner text-white">
          <h3>{{ $totalvideo }}</h3>
          <p>Today's Subscriber</p>
        </div>
        <div class="icon">
          <i class="fa fa-video"></i>
        </div>
        <a href="#" class="small-box-footer text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-danger">
        <div class="inner">
          <h3><i class="fa fa">$</i>{{ $totalrevenue }}</h3>

          <p>Total Revenue</p>
        </div>
        <div class="icon">
          <i class="fa fa-suitcase"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>

  <!--------- Live Video ----------------->
  <div class="row">
    <section class=" col-lg-12 connectedSortable">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            @php
              if (strtotime(date("Y/m/d h:i:s a")) >=  strtotime($livevideo->date . " ".$livevideo->time))
             {
                echo "Live Video";
             } 
             else{
                   echo "Upcoming Event";
             }
            @endphp
           
          </h3>
          <div class="card-tools">

            <i type="button" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i>
            </i>
          </div>
        </div>

        <div class="card-body">
             <!--------Live Video------------->           
           <iframe src="{{$livevideo->url}}" preload="none" frameborder="0" width="100%" height="500" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
             <!--------Live Video------------->
          </div>
      </div>
    </section>
     </div>
   <!--- Live video------>
@endsection
@section('script')
@endsection

