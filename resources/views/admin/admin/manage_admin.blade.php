@extends('layouts.admin.adminlayout')
@section('title', "MANAGE ADMIN")
@section('content')
 <!-- Main content -->
 <section class="content py-3">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title"><h2 class="text-uppercase text-center font-weight-bold py-3">Manage admin</h2></div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>

              </tbody>
              <tfoot>
              <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Action</th>
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
