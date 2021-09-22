@extends('admin.adminlayout')
@section('title', "Pending Users")
@section('content')
 <!-- Main content -->
 <section class="content py-3">
 @if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong style="font-size:15px;">Success: {{session('success') }}</strong><br/>
</div>
@endif
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title"><h5 class="text-uppercase text-center">Pending users</h5></div>
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
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @php
                    $i =0;
                @endphp
                @foreach ($pending_users as $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>    
                    <td>                    
                    <form action="{{ route('users.update', $user->slug)}}" method="POST" style="display:inline-block">
                      @method('PUT')
                      @csrf                        
                      <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-check"></i></button> 
                    </form>
                    <form action="{{ route('users.destroy', $user->id)}}" method="POST" style="display:inline-block">
                      @method('delete')
                      @csrf                        
                      <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>  
                        
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
