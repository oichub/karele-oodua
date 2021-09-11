@extends('admin.adminlayout')
@section('title', "Admin Dashboard")
@section('content')
 <div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $totaluser }}</h3>
          <p>Users</p>
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
          <h3>{{ $totalsub }}</h3>
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
          <h3><i class="fa fa">&#8358;</i>{{ $totalrevenue }}</h3>

          <p>Total Revenue</p>
        </div>
        <div class="icon">
          <i class="fa fa-suitcase"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>

  <!----------// Live Video ----------------->
  <div class="row">
  
    <section class=" col-lg-12 connectedSortable">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            @php
             if (strtotime(date("Y/m/d h.i A")) >=  strtotime($livevideo->date . " ".$livevideo->time))
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
           {!! $livevideo->embeded!!}
           {{-- {!! $livevideo->chat!!} --}}
             <!--------Live Video------------->
          </div>


      </div>
    </section>
     </div>
     
     <div class="row">
    <section class="col-lg-7 connectedSortable">
      <div class="card">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">SUBSCRIBERS</h3>
            <a href="javascript:void(0);">View Report</a>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex">
            <p class="d-flex flex-column">
              <span class="text-bold text-lg">18,230.00</span>
              <span>Subscribers Over Time</span>
            </p>
            <p class="ml-auto d-flex flex-column text-right">
              <span class="text-success">
                <i class="fas fa-arrow-up"></i> 33.1%
              </span>
              <span class="text-muted">Since last month</span>
            </p>
          </div>
          <!-- /.d-flex -->

          <div class="position-relative mb-4">
            <canvas id="sales-chart" height="200"></canvas>
          </div>

          <div class="d-flex flex-row justify-content-end">
            <span class="mr-2">
              <i class="fas fa-square text-primary"></i> This year
            </span>

            <span>
              <i class="fas fa-square text-gray"></i> Last year
            </span>
          </div>
        </div>
      </div>
    </section>
    <div class="col-lg-5 connectedSortable">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">RECENT VIDEO</h3>

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
                <img src="{{ ('plugins/dist/img/default-150x150.png') }}" alt="Product Image" class="img-size-50">
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
    </div>

  </div>
   <!--- Live video------>
     <?php

$startdate =  strtotime("-6 day");
// echo date('d-m-Y',$startdate);
$enddate = strtotime("tomorrow");
// echo date('d-m-Y',$enddate);

//   $startdate = strtotime("Sunday");
//   $enddate = strtotime("Saturday", $startdate);
  $daydata = "[";

  while ($startdate < $enddate) {
    $daydata .="'". date("M d", $startdate)."'"."," ;
    $startdate = strtotime("+1 day", $startdate);
  }

$daydata = htmlspecialchars_decode(rtrim($daydata," , ")."]");
// echo $daydata;

   ?>

<?php

$lastyear =  strtotime("-11 month");
// echo date('d-m-Y',$startdate);
$currentyear = strtotime("+1 month");
// echo date('d-m-Y',$enddate);

//   $startdate = strtotime("Sunday");
//   $enddate = strtotime("Saturday", $startdate);
  $monthdata = "[";

  while ($lastyear < $currentyear) {
    $monthdata .="'". date("M", $lastyear)."'"."," ;
    $lastyear = strtotime("+1 month", $lastyear);
  }

$monthdata = htmlspecialchars_decode(rtrim($monthdata," , ")."]");
// echo $monthdata;

   ?>
@endsection

@section('script')
<script>
$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  var salesChart  = new Chart($salesChart, {
    type   : 'bar',
    data   : {
      labels  : <?php echo $monthdata ?>,
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor    : '#007bff',
          data           : [1000, 2000, 4000, 2500, 2700, 2500, 3000,300, 65, 43, 300, 90]
        },
        {
          backgroundColor: '#ced4da',
          borderColor    : '#ced4da',
          data           : [700, 1700, 2700, 2000, 1800, 1500, 2000,12, 43, 53, 53, 54]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '8px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }
              return value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })


  var $visitorsChart = $('#visitors-chart')

  var visitorsChart  = new Chart($visitorsChart, {
    data   : {
      labels  : <?php echo $daydata ?>,
      datasets: [{
        type                : 'line',
        data                : [100, 120, 170, 167, 180, 177, 160],
        backgroundColor     : 'transparent',
        borderColor         : '#007bff',
        pointBorderColor    : '#007bff',
        pointBackgroundColor: '#007bff',
        fill                : false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
        {
          type                : 'line',
          data                : [60, 80, 70, 67, 80, 77, 100],
          backgroundColor     : 'tansparent',
          borderColor         : '#ced4da',
          pointBorderColor    : '#ced4da',
          pointBackgroundColor: '#ced4da',
          fill                : false
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
        }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero : true,
            suggestedMax: 200
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })



//-------------
//- PIE CHART -
//-------------
// Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
  var pieData        = {
    labels: [
        'Chrome',
        'IE',
        'FireFox',
        'Safari',
        'Opera',
        'Navigator',
    ],
    datasets: [
      {
        data: [700,500,400,600,300,10],
        backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
      }
    ]
  }
  var pieOptions     = {
    legend: {
      display: false
    }
  }
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  var pieChart = new Chart(pieChartCanvas, {
    type: 'doughnut',
    data: pieData,
    options: pieOptions
  })
})

</script>

@endsection

