@extends('pages.app')
@section('title', ' Reset Password')
@section('style')
 <link rel="stylesheet" href="{{ asset('pages/assets/css/login.css')}}">
@endsection
@section('content')
<div class="blog-section">
   <!-- ##### Breadcrumb Area Start ##### -->
      <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url('../pages/image/img.jpg');">
         <div class="container h-100">
            <div class="row h-100 align-items-center">
            <div class="col-12">
               <div class="breadcrumb-text">
                  <h2>Reset Password</h2>
               </div>
            </div>               
            </div>
         </div>  
      </div>
   <!-- ##### Breadcrumb Area End ##### -->  
    <div class="container"> 
        <div class="row justify-content-center my-5">
            <div class="col-md-6 col-12">   
                <div class="card">             
                    <div class="card-header">{{ __('Reset Password') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn" style="background-color:#ff4c4c">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>   
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
