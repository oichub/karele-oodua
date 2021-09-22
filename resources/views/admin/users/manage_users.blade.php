@extends('admin.adminlayout')
@section('title', "Manage Users")
@section('content')
 <!-- Main content -->
 <section class="content py-3">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title"><h4 class="text-uppercase text-center font-weight-bold">Manage users</h4></div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>                
                <th>Payment History</th>
              </tr>
              </thead>
              <tbody>
                  @php
                      $i =0;
                  @endphp
@foreach ($users as $user)
<tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->phone }}</td>    
    <td>
        <a href="{{route('users.show', $user->slug)}}"   class="btn btn-sm btn-primary"  >View<i class="ml-2 fa fa-angle-double-right"></i></a>

    </td>
</tr>

@endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>                
                <th>Payment History</th>
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
