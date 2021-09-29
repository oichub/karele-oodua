@extends('admin.adminlayout')
@section('title', "Manage Video")
@section('content')
<h3 class="font-weight-bold  text-center py-3">Manage videos</h3>
<div class="container">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong style="font-size:15px;">Success :{{session('success') }}</strong><br/>
    </div>
    @endif
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title"><h4 class=" text-center font-weight-bold">Manage users</h4></div>
          </div>
        </div>
      </div>
    </div>
         <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>S/N</th>
                <th>Video</th>
                <th>Title</th>
                <th>Date Uploaded</th>                
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                  @php
                      $i =0;
                  @endphp
@foreach ($videos as $video)
<tr>
    <td>{{ ++$i }}</td>
    <td>
<div style="padding:56.25% 0 0 0;position:relative;">
  <iframe src="{!! $video->url !!}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen 
    style="position:absolute;top:0;left:0;width:100%;height:100%;" title="{{$video->title}}">
  </iframe>
</div>
    </td>
    <td>{{ $video->title }}</td>
    <td>{{ $video->updated_at }}</td>
    <td>
         <a data-title="{{ $video->title }}" 
              data-id="{{ $video->id }}" data-slug="{{$video->slug}}"
               data-url="{{$video->url}}"
               data-toggle="modal" data-target="#editModal" 
               class="btn btn-primary btn-sm" href="#" >Update</a>
    <form action="{{route('adminvideo.delete', $video->id)}}" method="post" id="delete-form{{$video->id}}" style="display:none">
      @csrf
        @method('delete')
    </form>
    <a href="#" onclick="if(confirm('Are you sure you want to delete this video?')){
      event.defaultPrevented;
      document.getElementById('delete-form{{$video->id}}').submit();
           } else{
               event.defaultPrevented;
           }" class="btn btn-sm btn-danger">Delete</a>
    </td>
</tr>

@endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>S/N</th>
                <th>Video</th>
                <th>Title</th>
                <th>Date Uploaded</th>                
                <th>Action</th>
              </tr>
              </tfoot>
            </table>
          </div>

         <!-------------Edit Video------------->
<div class="modal fade modal-info" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-notify modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Update Video
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('adminvideo.update', 'video') }}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" name="slug" id="slug">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label> Video UrL </label>
                <div class="input-group">
                  <input id="url" type="text" name="url"  class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" placeholder="Video URL">
                  @if ($errors->has('url'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('url') }}</strong>
                  </span>
              @endif
                </div>
              </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>title</label>
                  <div class="input-group">
                    <input id="title"  type="text" name="title"  class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Title">
                    @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
                  </div>
                </div>
                </div>
              </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary btn-lg">Update Video</button>
              </div>
          </form>
      </div>
    </div>
  </div>
  <!-----------//--Edit Video------------->
@endsection

@section('script')
<script>
$("#example1").DataTable();
</script>
<script>
    // Edit admin detaiils
$('#editModal').on('show.bs.modal', function(event){
  var button =$(event.relatedTarget)
  var title = button.data('title')
  var url = button.data('url')
  var slug = button.data('slug')
  var modal = $(this)
  modal.find('.modal-body #title').val(title)
  modal.find('.modal-body #url').val(url)
  modal.find('.modal-body #slug').val(slug)
});
</script>
<script src="https://player.vimeo.com/api/player.js"></script>
@endsection

