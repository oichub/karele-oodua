@extends('pages.app')
@section('title', 'Email Verification')
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
                     <h2>Email Verification</h2>
                  </div>
               </div>               
                </div>
            </div>  
        </div>
        <!-- ##### Breadcrumb Area End ##### -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('New verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
