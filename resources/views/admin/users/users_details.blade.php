@extends('admin.adminlayout')
@section('title', "Account History")
@section('content')
 <!-- Main content -->
 <section class="content py-3">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header ">
            <div class="card-title float-left"><h4 class="text-uppercase text-center font-weight-bold ">Account History</h4></div>
            <div class="float-right">
              <button disabled="disabled" class="btn btn-info">Balance: ${{$user->balance}}</button>
            </div>
          </div>
          
          <!-- /.card-header -->
          <div class="card-body table-responsive" style="clear:both">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>S/N</th>
                <th>Amount</th>
                <th>Reference Number</th>
                <th>Payment Type</th>                
                <th>Date</th>
              </tr>
              </thead>
              <tbody>
                  @php
                      $i =0;
                  @endphp
                @foreach ($historys as $history)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $history->amount }}</td>
                    <td>{{ $history->ref }}</td>
                    <td>{{ $history->payment_type}}</td>    
                    <td>{{ $history->created_at}}</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>S/N</th>
                <th>Amount</th>
                <th>Reference Number</th>
                <th>Payment Type</th>                
                <th>Date</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
@endsection

@section('script')
<script>
        $("#example1").DataTable();

</script>

@endsection
