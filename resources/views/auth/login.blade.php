@extends('pages.app')
@section('title', 'Login')
@section('style')
 <link rel="stylesheet" href="{{ asset('pages/assets/css/login.css')}}">
@endsection
@section('content')
<div class="mid-class login">
  <div class="art-right-w3ls">
            <h2>Sign In and Sign Up</h2>
             <form method="POST" action="{{ route('login') }}">
                        @csrf
               <div class="main">
                  <div class="form-left-to-w3l">
                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="form-left-to-w3l ">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   <div class="clear"></div>
                  </div>
               </div>
               <div class="left-side-forget">
                  <input type="checkbox" class="checked">
                  <span class="remenber-me">Remember me </span>

               </div>
               <div class="right-side-forget">
                  <a href="#" class="for">Forgot password...?</a>
               </div>
               <div class="clear"></div>
               <div class="btnn">
                  <button type="submit">Sign In</button>
               </div>
            </form>
            <div class="w3layouts_more-buttn">
               <h3>Don't Have an account..?
                  <a href="{{ url('/register') }}">Sign Up Here
                  </a>
               </h3>
            </div>
         </div>        
<div class="art-left-w3ls">
 <h1 class="header-w3ls" style="color:#fb6049">
   KÁRELÉ OÒDUÀ Users' Login
            </h1>
         </div>
</div>
@endsection
@section('script')
    <script>
         addEventListener("load", function () { setTimeout(hideURLbar, 0); }, false); function hideURLbar() { window.scrollTo(0, 1); }
      </script> 
@endsection