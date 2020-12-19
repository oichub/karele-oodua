@extends('layouts.users.userlayout')
@section('title', 'SUBSCRIBED TO A PLAN')
@section('content')
<div class="container">
    <h2 class="font-weight-bold text-uppercase text-center py-3">Available subscription plans</h2>
@if ($user->subscriber->expiring_date < now())
    <div class="row">
  @foreach ($plans as $plan)

<div class="col-md-4">
    <div class="card card-dark card-outline">
        <div class="card-body">
        </div>

        <div class="card-title"> <h3 class="text-center">{{ $plan->name }}</h3> </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="text-right py-1 font-weight-bold">Duration: {{ ucwords($plan->duration) }}</small>
                </div>
                <div class="col">
                    <small class="text-right py-1 font-weight-bold"> Price <i class="fa fa">&#8358;</i>{{ $plan->price }}</small>
                </div>


            </div>

            <div class="container py-1">
            <div class="row">
                  <div class="col">

                <button type="button" class="btn btn-info">
                    Subscriber <span class="badge badge-danger">4</span>
                  </button>
                </div>
                  <div class="col">
                    @if (Auth::user()->balance >= $plan->price)
                   <a href="#subscribe" data-toggle="modal" subscribe="{{ $plan->id }}" class="btn btn-danger btn-block">Subscribe</a>
                   @else
                   <a href="#lowbalance" data-toggle="modal" class="btn btn-danger btn-block">Subscribe</a>
                   @endif
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col">
                </div>
            </div>
        </div>

    </div>
</div>

@endforeach

    </div>
    @else
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="">
                <div class="card">
                    <div class="card-header">
                        {{-- <div class="card-title"> --}}
                            <h3 class="text-center font-weight-bold">Current Plan</h3>
                        {{-- </div> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h4>Plan name :</h4>
                            </div>
                            <div class="col">
                                <h4><span class="font-weight-bold text-muted pl-3">{{ $user->plan->name }}</span></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h4>Plan price :</h4>
                            </div>
                            <div class="col">
                                <h4><span class="font-weight-bold text-muted pl-3"><i class="fa fa">&#8358;</i>{{ $user->subscriber->amount }}</span></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h4>Plan expiring date :</h4>
                            </div>
                            <div class="col">
                                <h4><span class="font-weight-bold text-muted pl-3">{{ date("M, d Y h:i:sa",strtotime($user->subscriber->expiring_date)) }}</span></h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3"></div>
    </div>

@endif
<div class="modal" id="lowbalance">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h2 class="modal-title">Low balance</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="card p-2">
                <h1 class="text-danger font-weight-bold">
                    OOPS! </h1>
                    <h3>your balance is to low for this subscription,
                    please fund your wallet
                </h3>

            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
</div>

</div>
<div id="subscribe" class="modal"></div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
    $('#subscribe').on('show.bs.modal', function(e){
      var id = $(e.relatedTarget).attr('subscribe');

    //   alert(id);
      $.ajax({
        type:'post',
        headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
        url:'{{route('confirm_subscription')}}',
        data:'subscribed='+id,
        success:function(data){
          $('#subscribe').html(data);
        }
      })
    })
  })
    </script>
@endsection

