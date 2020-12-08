@extends('layouts.admin.adminlayout')
@section('title', "ADD NEW VIDEO")
@section('content')

<h3 class="font-weight-bold text-uppercase text-center py-3">add new videos</h3>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form class="form-horizontal">
                <div class="form-group row">
                  <label for="inputName" class="col-sm-2 col-form-label">Video Name</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputName" placeholder="Full name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="inputEmail" placeholder="Video Date">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputName2" class="col-sm-2 col-form-label">Choose Video</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="inputName2" placeholder="Choose Video">
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

