@extends('layouts.users.userlayout')
@section('title', ' Make Payment')
@section('content')
<div class="container">
    <div class="w-50 ml-auto mr-auto">
        <form id="paymentform">
            @csrf
            <div class="row" style="margin-bottom:40px;">
                <div class="col-md-8 col-md-offset-2">
                    <p>
                        <div>
                            Karele Oodua Yearly Subscription <br>
                            ₦ 2,950
                            
                        </div>
                    </p>
                    <input type="hidden" id="email" value="{{$user->email}}">
                    <input type="hidden" id="amount" value="10"> 
                    <input type="hidden" id="phone" value="{{$user->phone}}">
                    <input type="hidden" id="userid" value="{{$user->slug}}">
                     <p>
                        <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                            <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                        </button>
                    </form>
                    </p>
                </div>
            </div>
       
        
                </div>
</div>
@endsection
@section('script')
  <script src="https://checkout.flutterwave.com/v3.js"></script>
 <script>
     $(document).ready(function () {
         $('#paymentform').submit(function (e) { 
             e.preventDefault();
             var name = $('#name').val();
             var phone_number = $('#phone').val();
             var email = $('#email').val();
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
        amount: amount,
        currency: "USD",
        country: "NG",
        payment_options: " ",
        customer: {
          email,
          phone_number,
          name,
        },
        callback: function (data) {
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
          console.log('Trasaction cancelled');
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
