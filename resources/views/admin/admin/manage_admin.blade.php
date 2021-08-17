@extends('admin.adminlayout')
@section('title', "Admin Management")
@section('content')
 <!-- Main content -->
 <section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1> Admins</h1>
      </div>

    </div>
  </div>
</section>
 <!--Alert section success and errors messages -->
 @if (session('success'))
<div class="alert alert-success" role="alert" >
    {{ session('success') }}
  </div>
@endif
 @if($errors->any())

              <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong style="font-size:25px;">Oops!
                     {{ "Kindly rectify below errors" }}</strong><br/>
                @foreach ($errors->all() as $error)
                {{$error }} <br/>
                @endforeach
              </div>
              @endif
<!-- //Alert section success and errors messages -->
<a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="margin-left:2%"> Add Admin</a>
<br/> <br/>
<!----------Admins Details---------------->
<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th scope="col">S/N</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Date Added</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @php
       $i=0;
      @endphp
      @if($admins)
      @foreach ($admins as $admin )
    <tr>
      <th scope="row">{{ ++$i }}</th>
    
      <td>{{$admin->name}}</td>
      <td>{{$admin->email}}</td>
      <td>{{$admin->phone}}</td>
      <td>{{$admin->created_at}}</td>
     
      <td>
        <!------------------------Show button Start Here------------------------->
        <a data-name="{{ $admin->name }}" 
          data-id="{{ $admin->id }}" data-slug="{{$admin->slug}}"
           data-phone="{{$admin->phone}}" data-email="{{ $admin->email}}"
             data-toggle="modal" data-target="#showModal" class="btn btn-primary btn-sm" href="#" ><i class="far fa-eye"  
             style="font-size: 15px;"></i> </a>||
             <a data-name="{{ $admin->name }}" 
              data-id="{{ $admin->id }}" data-slug="{{$admin->slug}}"
               data-phone="{{$admin->phone}}" data-email="{{ $admin->email}}"
               data-toggle="modal" data-target="#editModal" 
               class="btn btn-primary btn-sm" href="#" >
               <i class="far fa-edit"  style="font-size: 15px;"></i> </a>||
               <a data-toggle="modal" data-target="#deleteModal" href="#" data-product_id="{{ $admin->id }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> </a>
             </td>
            </tr>
      @endforeach
      @endif
    </tbody>
    <tfoot>
      <tr>
        <th scope="col">S/N</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Date Added</th>
        <th scope="col">Action</th>
      </tr>
    </tfoot>
  </table>
</div>
<!--------- // Admins Details-------------->

<!-------------- Add  Admin--------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-notidy" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!--------------------------Creating form start here------------------------------------>

          <form action="{{ route('add.admin') }}"   method="POST">
            @csrf
                     <!-- color -->
         <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label> Name</label>
              <div class="input-group">
                <input  type="text" name="name"  class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
              </div>
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Email</label>
                <div class="input-group">
                  <input  type="email" name="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">
                  @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
                </div>
              </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Phone</label>
                  <div class="input-group">
                    <input  type="text" name="phone"  class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}">
                    @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
                  </div>
                </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-lg">Add Admin</button>
            </div>
        </form>
          </div>
        </div>
      </div>
     
      <!--------// Add Admin----------------------------->
      

  <!-------------Edit Admin------------->
<div class="modal fade modal-info" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-notify modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Update Admin
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('update.admin', 'admin') }}" role="form"   runat="server" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label> Name</label>
                <div class="input-group">
                  <input id="name" type="text" name="name"  class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Full name">
                  @if ($errors->has('name'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
                </div>
              </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Email</label>
                  <div class="input-group">
                    <input id="email"  type="email" name="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                  </div>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Phone</label>
                    <div class="input-group">
                      <input id="phone" type="text" name="phone"  class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="Phnone Number">
                      @if ($errors->has('phone'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('phone') }}</strong>
                      </span>
                  @endif
                    </div>
                  </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary btn-lg">Update Admin</button>
              </div>
          </form>
      </div>
    </div>
  </div>
  <!-----------//--Edit Admin------------->
  <!----------------Show Admin---------------------->
<div class="modal fade modal-info" id="showModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-notify modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Admin's Details
       </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class="card card-solid">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Name</label>
          <div class="input-group">
            <input id="name" class="form-control">
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label>Email</label>
          <div class="input-group">
            <input id="email" class="form-control">
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label>Phone Number</label>
          <div class="input-group">
            <input id="phone" class="form-control">
          </div>
        </div>
      </div>
    </div>
  </div>
    </div>
    <!-- /.card-body -->
  </div>
  <div class="modal-footer">
      <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
  </div>
  </div>
  </div>
</div>
       <!----------------//--Show Admin ---------------->

  <!-- /.content -->
@endsection

@section('script')
<script>
        $("#example1").DataTable();

</script>

@endsection
