@extends('layouts.admin.adminlayout')
@section('title', "ADMIN DASHBOARD")

@section('content')
 <!-- Small boxes (Stat box) -->
 <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>72</h3>

          <p>Users</p>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>66</h3>

          <p>Subscribers</p>
        </div>
        <div class="icon">
          <i class="fa fa-bell"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning ">
        <div class="inner text-white">
          <h3>252</h3>

          <p>Live Videos</p>
        </div>
        <div class="icon">
          <i class="fa fa-video"></i>
        </div>
        <a href="#" class="small-box-footer text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>$4325.98</h3>

          <p>Total Revenue</p>
        </div>
        <div class="icon">
          <i class="fa fa-suitcase"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->


  {{-- country and subscribers --}}
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            RECENT SITE VIEW COUNT
          </h3>
          <div class="card-tools">

            <i type="button" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i>
            </i>
          </div>
        </div><!-- /.card-header -->

 
        <div class="card-body">
            <div class="d-flex">
              <p class="d-flex flex-column">
                <span class="text-bold text-lg">820</span>
                <span>Visitors Over Time</span>
              </p>
              <p class="ml-auto d-flex flex-column text-right">
                <span class="text-success">
                  <i class="fas fa-arrow-up"></i> 12.5%
                </span>
                <span class="text-muted">Since last week</span>
              </p>
            </div>
            <!-- /.d-flex -->

            <div class="position-relative mb-4">
              <canvas id="visitors-chart" height="200"></canvas>
            </div>

            <div class="d-flex flex-row justify-content-end">
              <span class="mr-2">
                <i class="fas fa-square text-primary"></i> This Week
              </span>

              <span>
                <i class="fas fa-square text-gray"></i> Last Week
              </span>
            </div>
          </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">LATEST USERS</h3>

          <div class="card-tools">

            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>

          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <ul class="users-list clearfix">
            <li>
              <img src="{{ url('plugins/dist/img/user1-128x128.jpg') }}" alt="User Image">
              <a class="users-list-name" href="#">Alexander Pierce</a>
              <span class="users-list-date">Today</span>
            </li>
            <li>
              <img src="{{ url('plugins/dist/img/user8-128x128.jpg') }}" alt="User Image">
              <a class="users-list-name" href="#">Norman</a>
              <span class="users-list-date">Yesterday</span>
            </li>
            <li>
              <img src="{{ url('plugins/dist/img/user7-128x128.jpg') }}" alt="User Image">
              <a class="users-list-name" href="#">Jane</a>
              <span class="users-list-date">12 Jan</span>
            </li>
            <li>
              <img src="{{ url('plugins/dist/img/user6-128x128.jpg') }}" alt="User Image">
              <a class="users-list-name" href="#">John</a>
              <span class="users-list-date">12 Jan</span>
            </li>
            <li>
              <img src="{{ url('plugins/dist/img/user2-160x160.jpg') }}" alt="User Image">
              <a class="users-list-name" href="#">Alexander</a>
              <span class="users-list-date">13 Jan</span>
            </li>
            <li>
              <img src="{{ url('plugins/dist/img/user5-128x128.jpg') }}" alt="User Image">
              <a class="users-list-name" href="#">Sarah</a>
              <span class="users-list-date">14 Jan</span>
            </li>
            <li>
              <img src="{{ url('plugins/dist/img/user4-128x128.jpg') }}" alt="User Image">
              <a class="users-list-name" href="#">Nora</a>
              <span class="users-list-date">15 Jan</span>
            </li>
            <li>
              <img src="{{ url('plugins/dist/img/user3-128x128.jpg') }}" alt="User Image">
              <a class="users-list-name" href="#">Nadia</a>
              <span class="users-list-date">15 Jan</span>
            </li>
          </ul>
          <!-- /.users-list -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-center">
          <a href="javascript::">View All Users</a>
        </div>
        <!-- /.card-footer -->
      </div>
    </section>

    <section class="col-lg-5 connectedSortable">

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Browser Usage</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="chart-responsive">
                    <canvas id="pieChart" height="150"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <li><i class="far fa-circle text-danger"></i> Chrome</li>
                    <li><i class="far fa-circle text-success"></i> IE</li>
                    <li><i class="far fa-circle text-warning"></i> FireFox</li>
                    <li><i class="far fa-circle text-info"></i> Safari</li>
                    <li><i class="far fa-circle text-primary"></i> Opera</li>
                    <li><i class="far fa-circle text-secondary"></i> Navigator</li>
                  </ul>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-white p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    United States of America
                    <span class="float-right text-danger">
                      <i class="fas fa-arrow-down text-sm"></i>
                      12%</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    India
                    <span class="float-right text-success">
                      <i class="fas fa-arrow-up text-sm"></i> 4%
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    China
                    <span class="float-right text-warning">
                      <i class="fas fa-arrow-left text-sm"></i> 0%
                    </span>
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.footer -->
          </div>
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
      <!-- Map card -->

      <!-- /.card-tools -->

  </div>

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

