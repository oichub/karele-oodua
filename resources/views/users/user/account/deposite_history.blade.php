@extends('layouts.users.userlayout')
@section('title', "USERS DEPOSIT HISTORY")
@section('content')
 <!-- Main content -->
 <section class="content py-3">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title"><h2 class="text-uppercase text-center font-weight-bold py-3">Manage users</h2></div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>S/N</th>
                <th>Amount</th>
                <th>Referrence Number</th>
                <th>Date</th>

              </tr>
              </thead>
              <tbody>
                  @php
                      $i =0;
                  @endphp
@foreach ($historys as $user)
<tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->amount }}</td>
    <td>{{ $user->ref }}</td>
    <td>{{ $user->created_at }}</td>

</tr>

@endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>S/N</th>
                <th>Amount</th>
                <th>Referrence</th>
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
