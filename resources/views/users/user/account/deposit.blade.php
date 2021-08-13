@extends('layouts.users.userlayout')
@section('title', ' Make Payment')
@section('content')
<div class="container">
    <div class="w-50 ml-auto mr-auto">
        <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
            <div class="row" style="margin-bottom:40px;">
                <div class="col-md-8 col-md-offset-2">
                    <p>
                        <div>
                            Karele Oodua Yearly Subscription <br>>
                            ₦ 2,950
                        </div>
                    </p>
                    <input type="hidden" name="email" value="{{$user->email}}">
                    <input type="hidden" name="amount" value="800"> 
                    <input type="hidden" name="currency" value="USD">
                     <p>
                        <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                            <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                        </button>
                    </p>
                </div>
            </div>
        </form
        {{--  <h2 class="text-center text-uppercase font-weight-bold py-5">Deposit</h2>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong style="font-size:15px;">Success :{{session('success') }}</strong><br/>
        </div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong style="font-size:20px;">Oops!
               {{ "Kindly rectify below errors" }}</strong><br/>
          @foreach ($errors->all() as $error)
          {{$error }} <br/>
          @endforeach
        </div>
        @endif

        <form action="{{ route('account.store') }}" method="post">
            @csrf
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Amount</label>
                <div class="col-sm-10">
                  <input type="number" value="{{ old('amount') }}" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }} " name="amount" placeholder="Enter Amount ">
                  @if ($errors->has('amount'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('amount') }}</strong>
                  </span>
                  @endif
                 </div>
                 {{-- <div class="form-group">
                    <div class="offset-sm-2 col-sm-10 my-2">
                      <button type="submit" class="btn btn-success btn-block btn-lg">Deposit</button>
                    </div>
                   </div> --}}
                </div>
        </form>
    </div>
</div>
@endsection
