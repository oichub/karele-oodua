@extends('admin.adminlayout')
@section('title', "Subscription Plan")
@section('content')
  <!-- Main content -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Subscription Plans</h1>
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
<a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="margin-left:2%"> Add Plan</a>
<br/> <br/>

<!----------Plan Details---------------->
<div class="table-responsive">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Date Added</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
     $i=0;
    @endphp
    @if($plans)
    @foreach ($plans as $plan)
  <tr>
    <th scope="row">{{ ++$i }}</th>
  
    <td>{{$plan->name}}</td>
    <td>{{$plan->price}}</td>
    <td>{{$plan->updated_at}}</td>
    <td>
      <!------------------------Edit button Start Here------------------------->
           <a data-name="{{ $plan->name }}" 
            data-id="{{ $plan->id }}" data-slug="{{$plan->slug}}" 
           data-price="{{$plan->price}}"
            data-date="{{$plan->updated_at}}"
             data-toggle="modal" data-target="#editModal" 
             class="btn btn-primary btn-sm" href="#" >
             <i class="far fa-edit"  style="font-size: 15px;"> &nbsp;Update</i> </a>||
             <a data-toggle="modal" data-target="#deleteModal" href="#" data-id="{{ $plan->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" style="font-size: 15px;"> &nbsp;

              Delete</i> </a>
           </td>
          </tr>
    @endforeach
    @endif
  </tbody>
  <tfoot>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Date Added</th>
      <th scope="col">Action</th>
    </tr>
  </tfoot>
</table>
</div>
<!--------- // Plan Details-------------->


<!-------------- Add  Plan--------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-notidy" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Plan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!--------------------------Creating form start here------------------------------------>

          <form action="{{ route('adminplan.store') }}"   method="POST">
            @csrf
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
                <label>Price</label>
                <div class="input-group">
                  <input  type="text" name="price"  class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ old('price') }}">
                  @if ($errors->has('price'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('price') }}</strong>
                  </span>
              @endif
                </div>
              </div>
              </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-lg">Add Plan</button>
            </div>
        </form>
          </div>
        </div>
      </div>
 <!-------------Update Plan------------->
 <div class="modal fade modal-info" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-notify modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Update Plan
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('adminplan.update', 'plan') }}" role="form"   runat="server" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" id="id">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label> Name</label>
                <div class="input-group">
                  <input  type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">
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
                  <label>Price</label>
                  <div class="input-group">
                    <input  type="text" name="price"  id="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ old('price') }}">
                    @if ($errors->has('price'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                @endif
                  </div>
                </div>
                </div>
              </div>          </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary btn-lg">Update Plan</button>
              </div>
          </form>
      </div>
    </div>
  </div>
  <!-----------//--Edit Admin------------->
  <!---------------------Delete Admin Start Here ---------------->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-notidy" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Plan Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!--------------------------Creating form start here------------------------------------>

       <form action="{{ route('adminplan.delete', 'plan') }}" role="form"   runat="server" method="POST">

          @csrf
          @method('DELETE')
          <div class="row">
              <div class="col-md-12">
<input type="hidden" name="id" id="id">
<p class="text-center"> Are you sure you want to delete this plan</p>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-warning" data-dismiss="modal">No? Cancel</button>
<button type="submit" class="btn btn-danger btn-lg">Yes? Delete this plan</button>
</div>
</form>
  </div>
</div>
</div>
<!--------------------// Delete Admin------------------------------->

  <!-- /.content -->
@endsection

@section('script')
<script>
        $("#example1").DataTable();
</script>
<script>
// Edit plan detaiils
$('#editModal').on('show.bs.modal', function(event){
  var button =$(event.relatedTarget)
  var name = button.data('name')
  var price = button.data('price')
  var slug = button.data('slug')
  var id = button.data('id')
  var modal = $(this)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #price').val(price)
  modal.find('.modal-body #slug').val(slug)
});
// Delete plan details
$('#deleteModal').on('show.bs.modal', function(event){
var button =$(event.relatedTarget)
var id= button.data('id')
var modal = $(this)
modal.find('.modal-title').text('Delete Plan Details')
modal.find('.modal-body #id').val(id)
})
</script>
@endsection
