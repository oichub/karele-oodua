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

            <form class="form-horizontal"  action="{{ route('uploadvideo') }}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <div class="form-group row">
                  <label for="video" class="col-sm-2 col-form-label">Choose Video</label>
                  <div class="col-sm-10">
                    <input type="file"  name="video" value="{{ old('video') }}" class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }} "  placeholder="Choose Video">
                    @if ($errors->has('video'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('video') }}</strong>
                    </span>
                    @endif
                </div>
                </div>
                <div class="form-group row">
                  <label for="inputName" class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }} " id="inputName" name="title" value="{{ old('title') }}" placeholder="Full name">
                    @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('title') }}</strong>
                    </span>
                    @endif
                </div>
              </div>
                <div class="form-group row">
                  <label for="description" class="col-sm-2 col-form-label">Video Decription</label>
                  <div class="col-sm-10">
                    <textarea name="description" col="3" class="form-control{{$errors->has('description') ? ' is-invalid' : ''}}"></textarea>
                    </span>
                       @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('description') }}</strong>
                    </span>
                    @endif
                </div>
                </div>
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Add Video</button>
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

