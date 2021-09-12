@extends('layouts.users.userlayout')
@section('title', ' Make Payment')
@section('content')
<div class="container row" style="padding-top: 100px;">

  <div class="col-md-4 offset-md-4">
    <h4 style="text-align: center; padding-bottom:10px;">Fund your Karele Account</h4>
    <div class="card">
      <div class="card-body">
        <p class="card-box-msg">Choose your payment method</p>
       
        <form id="form-shower">
          <div class="input-group mb-3">
            <select id="paymentType" class="custom-select" required>
              <option value="" selected disabled>Select payment method</option>
              <option value="payPalForm">PayPal</option>
              <option value="paymentform">FlutterWave</option>
            </select>
          </div>
        </form> 
        <!-- flutterwave form start     -->
        <form id="paymentform" style="display: none;">
          @csrf
          <p class="card-box-msg">Enter amount to fund your Account <a style="float: right;" href="javascript:document.location.reload();"><i class="fa fa-sync" aria-hidden="true"></i></a></p>          
          <div class="input-group mb-3">
            <input type="number" id="amount" name="amount" class="form-control" placeholder="Amount" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span>$</span>
              </div>
            </div>
          </div>         
          <input type="hidden" id="email" value="{{$user->email}}"> 
          <input type="hidden" id="name" value="{{$user->name}}">          
          <input type="hidden" id="phone" value="{{$user->phone}}">
          <input type="hidden" id="userid" value="{{$user->slug}}">        
            <div class="col-12">
              <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
              </button>
            </div>            
        </form> 
        <!-- Flutterwave form end -->
        <!-- Paypal form start -->
        <form id="payPalForm" style="display: none;">
          @csrf
          <p class="card-box-msg">Enter amount to fund your Account <a style="float: right;" href="javascript:document.location.reload();"><i class="fa fa-sync" aria-hidden="tr</p>
          <div class="input-group mb-3">
            <input type="number" id="amount" name="amount" class="form-control" placeholder="Amount" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span>$</span>
              </div>
            </div>
          </div>         
          <input type="hidden" id="email" value="{{$user->email}}"> 
          <input type="hidden" id="name" value="{{$user->name}}">          
          <input type="hidden" id="phone" value="{{$user->phone}}">
          <input type="hidden" id="userid" value="{{$user->slug}}">        
            <div class="col-12">
            <button class="btn btn-warning btn-lg btn-block"><i class="fab fa-paypal"></i> Pay With <span style="color:midnightblue;">Pay</span><span style="color:blue;">pal</button>          
            </div>          
        </form>  
        <!-- Paypal form end     -->
      </div> 
    </div>   
  </div>   
</div>
@endsection
@section('script')
  <script src="https://checkout.flutterwave.com/v3.js"></script>
  <script>
    $("#paymentType").on("change", function(){
      $("#" + $(this).val()).show().siblings().hide();
    })
  </script>
 <script>
     $(document).ready(function () {
         $('#paymentform').submit(function (e) { 
             e.preventDefault();
             var name = $('#name').val();
             var email = $('#email').val();
             var phone_number = $('#phone').val();             
             var amount = parseInt($('#amount').val()) ;
             // function payment
             makePayment(email,name, phone_number, amount)
         });
     });
 </script>
 <script>
    function makePayment(email,name, phone_number, amount) {
      FlutterwaveCheckout({
        public_key: "FLWPUBK_TEST-f1d619076aaca1ba96dc7890df05f884-X",
        tx_ref: "RX1_{{substr(rand(0, time()), 0, 7)}}",
        amount,
        currency: "USD",
        country: "NG",
        payment_options: " ",
        customer: {
          email,
          phone_number,
          name,
        },
        callback: function (data) {
          // console.log(data);
         var transaction_id = data.transaction_id;
         var _token = $("input[name='_token']").val();
          $.ajax({
            type: "POST",
            url: "{{URL::to('users/user/verify-payment')}}",
            data: {
              _token,
              transaction_id,
          },
            success: function (response) {              
              console.log(response);
            }
          });
        },
        onclose: function() {
          
          // console.log('Trasaction cancelled');
        },
        customizations: {
          title: "Karele Oodua Lafefe",
          description: "Karele Oodua Lafefe yearly subscription",
          logo: "https://drive.google.com/file/d/1i_8vlVvXi8HG1sbh7IFv2Z2c_zPu4OaD/view",
        },
      });
    }
  </script>
@endsection
