@extends('admin.adminlayout')
@section('title', "Add Video")
@section('content')

<h3 class="font-weight-bold text-uppercase text-center py-3">add new videos</h3>
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

            <form class="form-horizontal"  action="{{ route('plan.store') }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <div class="form-group row">
                  <label for="inputName" class="col-sm-2 col-form-label">Plan Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} " id="inputName" name="name" value="{{ old('name') }}" placeholder="Plan name">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>

                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Price Price</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }} " id="inputName" name="price" value="{{ old('price') }}" placeholder="Video Price">
                      @if ($errors->has('price'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('price') }}</strong>
                      </span>
                      @endif
                  </div>

                  </div>

                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Duration</label>
                    <div class="col-sm-10">
                      <select class="form-control{{ $errors->has('duration') ? ' is-invalid' : '' }} " name="duration">
                      <option  value="{{ old('duration') }}">Seletct</option>
                      <option value="6 hours">One Time</option>
                      <option value="1 day">Day</option>
                      <option value="1 week">Week</option>
                      <option value="1 month">Month</option>
                      <option value="4 months">Quater</option>
                      <option value="6 months">Half Year</option>
                      <option value="1 year">Year</option>
                      </select>
                      @if ($errors->has('duration'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('duration') }}</strong>
                      </span>
                      @endif
                    </div>
                 </div>
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Add Plan</button>
                  </div>
                </div>
              </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection

@section('script')

@endsection

