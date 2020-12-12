@extends('layouts.users.userlayout')
@section('title', 'DEPOSIT INTO YOUR ACCOUNT')
@section('content')
<div class="container">
    <div class="w-50 ml-auto mr-auto">
        <h2 class="text-center text-uppercase font-weight-bold py-5">Deposit</h2>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong style="font-size:15px;">Success :{{session('success') }}</strong><br/>
        </div>
        @endif


        @if($errors->any())
        {{-- {{ dd($errors) }} --}}
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
                 {{-- <div class="form-group"> --}}
                    <div class="offset-sm-2 col-sm-10 my-2">
                      <button type="submit" class="btn btn-success btn-block btn-lg">Deposit</button>
                    </div>
                  {{-- </div> --}}
                </div>
        </form>
    </div>
</div>
@endsection
