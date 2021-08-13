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
                            Lagos Eyo Print Tee Shirt
                            ₦ 2,950
                        </div>
                    </p>
                    <input type="hidden" name="email" value="otemuyiwa@gmail.com"> {{-- required --}}
                    <input type="hidden" name="orderID" value="345">
                    <input type="hidden" name="amount" value="800"> {{-- required in kobo --}}
                    <input type="hidden" name="quantity" value="3">
                    <input type="hidden" name="currency" value="NGN">
                    <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                    {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}
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
