<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kárélé Oòduà Láféfé:: @yield('title', '') </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('pages/assets/css/style-starter.css')}}">     
       @yield('style')
       <style>
           @media (max-width:368px){
               #title-display{
                   display:none;
               }
           }
       </style>
   </head>
    <body>
      <header id="site-header" class="fixed-top">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg stroke">
                <h2>
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                        Kárélé &nbsp; <span id="title-display"> Oòduà Láféfé </span></a>
                </h2>
                <!-- if logo is image enable this
                <a class="navbar-brand" href="#index.html">
                    <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                </a> -->
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                        </li>                   
                        <li class="nav-item">
                            <a class="nav-link" href="/about" id="prevent-about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact" id="prevent-contact">Contact Us</a>
                        </li>
                        @guest                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/login') }}">Login </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/register') }}">Sign Up</a>
                            </li>
                            @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    {{ ucwords(Auth::user()->name) }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu">
                                        @php
                                        switch(Auth::user()->role)
                                        {
                                            case 'admin':
                                            $url = 'adminDashboard';
                                            break;
                                            case 'user':
                                            $url = 'usersdashboard';
                                            break;
                                            default:
                                            $url = 'home';
                                        }
                                        @endphp
                                    <a class="dropdown-item" href="{{ route($url) }}"> Dashboard </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <!-- search button -->
                        <!-- <div class="search-right ml-lg-3">
                            <form action="#search" method="GET" class="search-box position-relative">
                                <div class="input-search">
                                    <input type="search" placeholder="Enter Keyword" name="search" required="required"
                                        autofocus="" class="search-popup">
                                </div>
                                <button type="submit" class="btn search-btn"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </form>
                        </div>   -->
                        <!-- //search button -->
                    </ul>
                </div>
                <!-- toggle switch for light and dark theme -->
               <!-----// <div class="cont-ser-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>--->
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <!--//header-->
    <!--- Navigation Bar -->
