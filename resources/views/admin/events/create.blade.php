@extends('admin.adminlayout')
@section('title', "Add  New Event")
@section('content')
<h3 class="font-weight-bold text-uppercase text-center py-3">Add New Upcoming Event</h3>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong style="font-size:15px;">Success :{{session('success') }}</strong><br/>
            </div>
            @endif

            @if($errors->any())
            {{-- {{ dd($errors) }} --}}
            <div class="alert alert-danger alert-dismissible fade show">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong style="font-size:20px;">Oops!
                   {{ "Kindly rectify below errors" }}</strong><br/>
              @foreach ($errors->all() as $error)
              {{$error }} <br/>
              @endforeach
            </div>
            @endif

            <form class="form-horizontal"  action="{{ route('events.store') }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <div class="form-group row">
                  <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} " id="inputName" name="name" value="{{ old('name') }}" placeholder="Full name">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }} " id="inputName" name="price" value="{{ old('price') }}" placeholder="Price">
                      @if ($errors->has('price'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('price') }}</strong>
                      </span>
                      @endif
                  </div>

                  </div>

                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-10">
                    <input type="date" id="inputEmail" name="date"  value="{{ old('date') }}" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }} " placeholder="Video Date">
                    @if ($errors->has('date'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('date') }}</strong>
                    </span>
                    @endif
                </div>
                </div>
                    <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Time</label>
                  <div class="col-sm-10">
                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" name="time" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                      </div>
                      @if ($errors->has('time'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('time') }}</strong>
                    </span>
                    @endif
                </div>
                </div>
                <div class="form-group row">
                  <label for="inputName2" class="col-sm-2 col-form-label">Choose image/video demo</label>
                  <div class="col-sm-10">
                    <input type="file"  name="file" value="{{ old('file') }}" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }} " id="file" placeholder="Choose File(Optional)">
                    @if ($errors->has('file'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('file') }}</strong>
                    </span>
                    @endif
                </div>
                </div>
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-success btn-lg">Add Event</button>
                  </div>
                </div>
              </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
@section('script')

<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

   //Timepicker
   <script>

    $('#timepicker').datetimepicker({
      format: 'LT', 
    });
 </script>

@endsection