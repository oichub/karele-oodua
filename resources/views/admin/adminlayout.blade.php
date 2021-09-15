<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KARELE::@yield('title') </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('plugins/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">

  {{--  <script src="{{ asset('plugins/datatables/jquery.dataTables.js')}}"></script>  --}}
  {{--  <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>  --}}
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('style')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ url('/') }}" class="nav-link">Home</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
 <!-- Body -->

 {{-- @require('.contact') --}}


  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <span class="brand-text font-weight-light">KARELE</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">
              {{ ucwords(Auth::User()->name) }}
            </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('adminDashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">

              </ul> --}}
          </li>
        <!--users -->
        {{-- @if(Auth::User()->hasRole(1)) --}}


          <!-- Users -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Users</p>
              <i class="right fas fa-angle-left"></i>

            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.create') }}" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Add Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="fas fa-users"></i>
                  <p>Manage users</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- // Users -->
          <!-------Plans----------->
          <li class="nav-item">
            <a href="{{ route('plan.add') }}" class="nav-link">
              <i class="fas fa-users"></i>
              <p> Subscription Plan</p>
            </a>
          </li>
         <!--------//-- Plan-------------->
          <!--------- Upcoming events -------->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Events</p>
              <i class="right fas fa-angle-left"></i>

            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('events.create') }}" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Add Event</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('events.index') }}" class="nav-link">
                  <i class="fas fa-users"></i>
                  <p>Manage Events</p>
                </a>
              </li>
            </ul>
          </li>

<!--------- // Upcoming events -------->


           <!-- Video -->
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-video"></i>
              <p> Video</p>
              <i class="right fas fa-angle-left"></i>

            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('adminvideo.upload')}}" class="nav-link"> 
                   <i class="fas fa-upload"></i> 
                  <p>Upload Video</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('adminvideo.index')}}" class="nav-link"> 
                  <i class="fas fa-video"></i>
                  <p>Manage Video</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- // video -->


             <!-- Admin -->
             <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p> Admin</p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('adminsmanagement')}}" class="nav-link">
                    <i class="fas fa-users"></i>
                    <p>Manage Admin</p>
                  </a>
                </li>

              </ul>
            </li>
            <!-- // Students -->

        {{-- @endif --}}


          <li class="nav-header">Settings</li>

          <li class="nav-item">
            <a href="{{ route('admins_change_password') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Change Password</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Sign Out</p>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          </li>
    </section>
    <!-- /.content -->
  </ul>
</nav>
  </div>
  </aside>
  {{--  @include('users.admin.layout.navbar')  --}}
  <div class="content-wrapper">
   <div class="container-fluid">
  @yield('content')
  </div>
  </div>
  {{--  @include('users.admin.layout.footer')  --}}

  <!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y')}} KARELE OODUA</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Designed By OIC Hub
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
  $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Sparkline -->
  <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
  <script src="{{ asset('plugins/dist/js/adminlte.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>


  <!-- daterangepicker -->
  <!-- overlayScrollbars -->
  <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  @yield('script')
