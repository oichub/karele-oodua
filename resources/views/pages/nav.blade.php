<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kárelé Oòduà :: @yield('title', '') </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--  <link rel="stylesheet" href="{{ asset('pages/css/bootstrap.min.css') }}">  --}}
    <link rel="stylesheet" href=" {{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/style.css') }}">
    <link rel="stylesheet" href=" {{ asset('fontawesome-free/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    @yield('style')
    <style>
        ul li {
            text-decoration: none;
            color: black;
            list-style-type: none;
            font-size: 18px;

        }
    </style>
    </head>
    <!--- Navigation Bar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">

            <div class="navbar-header">
            <h2 class="title text-center">  KÁRELÉ OÒDUÀ TV </h2>
            </div>
            <ul class="navbar">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="#signup" data-toggle="collapse"> Sign Up</a></li>
                <li class="ml-4 nav-item">
                <a class="nav-link" href="{{ url('/') }}">Login</a></li>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->fname ." ". Auth::user()->lname }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
            </ul>

            </div>
    </nav>
    <!--- Navigation Bar -->
