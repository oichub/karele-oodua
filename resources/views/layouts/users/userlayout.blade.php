<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kárélé oòduà láféfé::@yield('title') </title>
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
  <link rel="stylesheet" href="{{asset('plugins/dist/css/adminlte.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
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
      <ul class="navbar-nav ml-auto mr-2">
         <li class="nav-item">          
          <button class="btn btn-info"><span class="info-box-text">Balance: </span> ${{$user->balance}}</button>
        </li> 
      </ul>
    </nav>    
    <!-- /.navbar -->
 <!-- Body -->



  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <span class="brand-text font-weight-light">Kárélé oòduà láféfé</span>
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
            <a href="{{ route('usersdashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>

          </li>
          <!-- Students -->
          <li class="nav-item has-treeview 
           @if(request()->path() == 'users/user/makepayment'||
            request()->path() == 'users/user/subscribe' || request()->path()=='users/account'){
              {{'menu-open'}}
            } @endif">

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Payment</p>
              <i class="right fas fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/users/user/makepayment') }}" class="nav-link @if(request()->path()=='users/user/makepayment'){{'active'}}@endif ">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Fund Account</p>
                </a>
              </li>
        
              <li class="nav-item">
                <a href="{{ url('/users/user/subscribe') }}" class="nav-link @if(request()->path()=='users/user/subscribe'){{'active'}} @endif ">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Subscribe</p>
                </a>
              </li>
          <li class="nav-item">
    <a href="{{ route('account.index') }}" class="nav-link @if(request()->path()=='users/account'){{'active'}} @endif ">
      <i class="fas fa-dollar-sign nav-icon"></i>
      <p>Account History</p>
    </a>
  </li> 
     </ul>
     </li>
          <!-- // Account -->
  <!-- Video -->
  <li class="nav-item">
    <a href="{{route('previousvideos.index')}}" class="nav-link @if(request()->path()=='user/videos/previousvideos'){{'active'}} @endif">
      <i class="nav-icon fa fa-tv"></i>
      <p>Videos</p>    
    </a>
  </li>  
  <li class="nav-item">
    <a href="{{ route('usersprofile') }}" class="nav-link @if(request()->path()=='users/profile'){{'active'}} @endif">
      <i class="fas fa-user"></i>
      <p>My Profile</p>
    </a>
  </li>  
<!-- // Account -->


        {{-- @endif --}}
          <li class="nav-header">Settings</li>
          <li class="nav-item">
            <a href="{{ route('change_password') }}" class="nav-link @if(request()->path()=='users/admin/change_password'){{'active'}} @endif">
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
  
  <div class="content-wrapper">
   <div class="container-fluid">
  @yield('content')
  </div>
  </div>
  <!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y')}} Karele Oodua Lafefe</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Powered By OIC Hub
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
