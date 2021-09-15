@extends('admin.adminlayout')
@section('title', "EVents")
@section('content')
  <!-- Main content -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> EVents</h1>
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
<a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="margin-left:2%"> Add Event</a>
<br/> <br/>
<!---------Event Details---------------->
<div class="table-responsive">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Title</th>
      <th scope="col">Event Date</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
     $i=0;
    @endphp
    @if($events)
    @foreach ($events as $event)
  <tr>
    <th scope="row">{{ ++$i }}</th>
     @php
     $date =date("d/m/Y h:g:s a", strtotime($event->date." ".$event->time));
      $eventdate =strtotime($event->date);
      $today = strtotime(date("Y-m-d"));

     @endphp
    <td>{{$event->name}}</td>
    <td>{{ $date}}</td>
    <td>
      @if($today > $eventdate)
      {{ "Past event" }}
      @elseif($today < $eventdate)
      {{"Upcoming event"}}
      @else
      {{ 'Today Event'}}
      @endif
    </td>
    <td>
      <!------------------------Edit button Start Here------------------------->
           <a data-name="{{ $event->name}}"
            data-chat="{{ $event->chat}}" 
            data-id="{{ $event->id }}" 
            data-slug="{{$event->slug}}" 
            data-date="{{$event->date}}"
            data-time="{{$event->time}}"
            data-embeded="{{$event->embeded}}"
             data-toggle="modal" data-target="#editModal" 
             class="btn btn-primary btn-sm" href="#" >
             <i class="far fa-edit"  style="font-size: 15px;"></i> </a>||
             <a data-toggle="modal" data-target="#deleteModal" href="#" data-id="{{ $event->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" style="font-size:15px;"></i> </a>
           </td>
          </tr>
    @endforeach
    @endif
  </tbody>
  <tfoot>
    <tr>
        <th scope="col">S/N</th>
        <th scope="col">Title</th>
        <th scope="col">Event Date</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
    </tr>
  </tfoot>
</table>
</div>
<!--------- // Event Details-------------->
<!-------------- Add  Event--------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-notidy" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!--------------------------Creating form start here------------------------------------>
          <form class="form-horizontal"  action="{{ route('events.store') }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
<!-----------Embeded Code ---------------->
<div class="form-group row">
<label for="inputName" class="col-sm-2 col-form-label">Embeded Code</label>
<div class="col-sm-10">
  <textarea row="5" name="embeded" class="form-control{{ $errors->has('embeded') ? ' is-invalid' : '' }}" value="{{ old('embeded') }}"></textarea>
   @if ($errors->has('embeded'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('embeded') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="form-group row">
<label for="inputName" class="col-sm-2 col-form-label">Embeded Chat</label>
<div class="col-sm-10">
  <textarea row="5" name="chat" class="form-control{{ $errors->has('chat') ? ' is-invalid' : '' }}" value="{{ old('chat') }}"></textarea>
   @if ($errors->has('chat'))
  <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('chat') }}</strong>
  </span>
  @endif
</div>
</div>
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Event's Title </label>
        <div class="col-sm-10">
          <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} "  name="name" value="{{ old('name') }}" placeholder="Event's name">
          @if ($errors->has('name'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
          @endif
      </div>
      </div>

<!----------------------Date-------------------->
              <div class="form-group row">
              <label for="inputEmail" class="col-sm-2 col-form-label">Date</label>
              <div class="col-sm-10">
                <input type="date"  name="date"  value="{{ old('date') }}" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }} " placeholder="Video Date">
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
                  <input type="time" class="form-control datetimepicker-input" name="time" data-target="#timepicker"/>
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
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-lg">Add Event</button>
            </div>
        </form>
          </div>
        </div>
      </div>
 <!-------------Update Event------------->
 <div class="modal fade modal-info" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-notify modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('events.update', 'plan') }}" role="form"   runat="server" method="POST">
        @csrf
        @method('PUT')
        
      <div class="modal-body">
        <input type="hidden" name="slug" id="slug">
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Embeded Code</label>
            <div class="col-sm-10">
              <textarea row="5" id="embeded" name="embeded" class="form-control{{ $errors->has('embeded') ? ' is-invalid' : '' }}"></textarea>
               @if ($errors->has('embeded'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('embeded') }}</strong>
              </span>
              @endif
            </div>
            </div>
            <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Embeded Chat</label>
            <div class="col-sm-10">
              <textarea row="5" id="chat" name="chat" class="form-control{{ $errors->has('chat') ? ' is-invalid' : '' }}"></textarea>
               @if ($errors->has('chat'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('chat') }}</strong>
              </span>
              @endif
            </div>
            </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Event's Title </label>
                    <div class="col-sm-10">
                      <input type="text" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} "  name="name" value="{{ old('name') }}">
                      @if ($errors->has('name'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                      </span>
                      @endif
                  </div>
                  </div>
            
            <!----------------------Date-------------------->
                          <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Date</label>
                          <div class="col-sm-10">
                            <input type="date" id="date" name="date"  value="{{ old('date') }}" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }} ">
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
                              <input type="text" id="time" class="form-control datetimepicker-input" name="time" data-target="#timepicker"/>
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

                        </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary btn-lg">Update Event</button>
              </div>
          </form>
      </div>
    </div>
  </div>
  <!-----------//--Update Event------------->
  <!---------------------Delete Admin Start Here ---------------->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-notidy" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Event Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!--------------------------Creating form start here------------------------------------>

       <form action="{{ route('events.delete') }}" role="form"   runat="server" method="POST">

          @csrf
          @method('DELETE')
          <div class="row">
              <div class="col-md-12">
<input type="hidden" name="id" id="iddelete">
<p class="text-center"> Are you sure you want to delete this Event</p>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-warning" data-dismiss="modal">No? Cancel</button>
<button type="submit" class="btn btn-danger btn-lg">Yes? Delete this Event</button>
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
  var embeded = button.data('embeded')
  var slug = button.data('slug')
  var time = button.data('time')
  var id = button.data('id')
  var date = button.data('date')
  var chat = button.data('chat')
  var modal = $(this)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #code').val(id)
  modal.find('.modal-body #time').val(time)
  modal.find('.modal-body #slug').val(slug)
  modal.find('.modal-body #date').val(date)
  modal.find('.modal-body #embeded').val(embeded)
  modal.find('.modal-body #chat').val(chat)
});
// Delete Event details
$('#deleteModal').on('show.bs.modal', function(event){
var button =$(event.relatedTarget)
var id= button.data('id')
var modal = $(this)
modal.find('.modal-title').text('Delete Event Details')
modal.find('.modal-body #iddelete').val(id)
})
</script>
@endsection
