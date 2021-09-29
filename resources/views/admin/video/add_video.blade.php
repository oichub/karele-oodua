@extends('admin.adminlayout')
@section('title', "Add Video")
@section('content')
<h3 class="font-weight-bold text-center py-3">Add New  Video</h3>
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

            <form method="POST"  action="{{ route('uploadvideo') }}">
                {{ csrf_field() }}
               <!-----------url Code---------------->
   <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Video URL</label>
    <div class="col-sm-10">
      <textarea row="3" name="url" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}"></textarea>
       @if ($errors->has('url'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('url') }}</strong>
      </span>
      @endif
  </div>
  </div>
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Event's Title </label>
            <div class="col-sm-10">
              <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }} "  name="title" value="{{ old('title') }}" placeholder="Event's title">
              @if ($errors->has('title'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
              </span>
              @endif
          </div>
          </div>
        
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-success btn-lg">Add Video </button>
                  </div>
                </div>
              </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection

@section('script')
<script src="https://player.vimeo.com/api/player.js"></script>
@endsection

