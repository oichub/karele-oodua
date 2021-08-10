@extends('pages.app')
@section('title', 'Login')
@section('style')

 <link rel="stylesheet" href="{{ asset('pages/assets/css/login.css')}}">
@endsection
@section('content')
<div class="blog-section">
   <!-- ##### Breadcrumb Area Start ##### -->
      <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url('pages/image/img.jpg');">
         <div class="container h-100">
            <div class="row h-100 align-items-center">
            <div class="col-12">
               <div class="breadcrumb-text">
                  <h2>Sign-In</h2>
               </div>
            </div>               
            </div>
         </div>  
      </div>
   <!-- ##### Breadcrumb Area End ##### -->   
   <div class="container">
      <div class="row m-5">            
         <div class="offset-md-3 col-md-6 col-12">
               <!-- <div class="card-title"> -->
                  <h1 class="text-center" style="font-size:x-large; font-weight:bold">Login</h1>                      
               <!-- </div> -->
               <div class="card-body">                                       
               <form method="POST" action="{{ route('login') }}">
                  @csrf                   
                  <div class="form-group">
                        <label for="email" class="mb-1">Email:</label>
                        <input type="email" class="form-control @error('email') 
                        is-invalid @enderror" id="email" name="email" autocomplete="email"
                        placeholder="Enter email "required autofocus value="{{old('email')}}">                        
                        @error('email')
                           <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                  </div>                                    
                  <div class="form-group">
                        <label for="password" class="mb-1">Password:</label>
                        <input type="password" class="form-control @error('password') 
                        is-invalid @enderror" autocomplete="current-password"
                        id="password" name="password" placeholder="Enter Password" required>
                        @error('password')
                           <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                           </span>
                        @enderror   <div class="clear"></div>
                  </div>  
               <div class="form-group pt-2">
               <input type="submit" value="Log In" class="btn mb-2" style="background-color:#ff4c4c">
               <div class="form-group pt-2">
                  @if (Route::has('password.request'))
                        <a class="float-left ml-3" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                        </a>
                  @endif
                        <a href="{{ url('/register') }}" class="float-right mr-3">Sign Up Here</a>
               </form>
               </div>
         </div>
      </div>
   </div>
</div>

@endsection
@section('script')
    <script>
         addEventListener("load", function () { setTimeout(hideURLbar, 0); }, false); function hideURLbar() { window.scrollTo(0, 1); }
      </script> 
@endsection


