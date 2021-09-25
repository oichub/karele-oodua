@extends('layouts.users.userlayout')
@section('title', ' Make Payment')
@section('content')
<div class="container row" style="padding-top: 100px;">

<div class="col-md-4 offset-md-4">
  <h4 style="text-align: center; padding-bottom:10px;">Subscribe to watch our videos</h4>
  <div class="card">
  @if (session('error') || session('success'))
  <div class="alert alert-success alert-dismissible fade show">
    <p class="{{ session('error') ? 'error':'success' }}">
      {{ session('error') ?? session('success') }}
    </p>
  </div>
  @endif 
  <!-- @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong style="font-size:15px;">Success :{{session('success') }}</strong><br />
        </div>
        @endif -->
    <div class="card-body">
      <p class="card-box-msg"></p>
             
      <form action="{{route('subscribe.now')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <select name="plan" class="custom-select" required>
            <option value="" selected disabled>Select subscription plan</option>
            @foreach ($plans as $plan)
                <option value="{{$plan->name}}"> {{ $plan->name }}</option>
            @endforeach
            <!-- <option value="payPalForm">PayPal</option>
            <option value="paymentform">FlutterWave</option> -->
          </select>
        </div>        
        <div class="input-group mb-3">            
          <input type="text" id="amount" name="amount" class="form-control" placeholder="100" disabled>
          <div class="input-group-append">
            <div class="input-group-text">
              <span>$</span>
            </div>
          </div>
        </div>                       
          <div class="col-12">
            <button class="btn btn-success btn-lg btn-block" type="submit">
               Subscribe Now!
            </button>
          </div>            
      </form>           
    </div> 
  </div>   
</div>   
</div>
@endsection
@section('script')

@endsection
