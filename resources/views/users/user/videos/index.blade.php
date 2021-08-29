@extends('layouts.users.userlayout')
@section('title', 'Previous Video')
@section('style')
<style>
.gallery{
  border: 1px transparent solid;  
  /* padding: 50px; */
  margin-top: 20px;
  padding-left: 5px;
  position: relative;  
}
.gallery .play{
   position: absolute;
   top: 40%;
   left: 50%;
   transform: translate(-50%, -50%);
   -webkit-transform: translate(-50%, -50%);
   background-color: #555;   
   font-size:16px;
   padding: 12px 18px;
   border: none;
   color: #fff;
   cursor: pointer;
   opacity: .8;
   border-radius: 20px;   
}
.gallery .play:hover{
  background-color: #ff4c4c;
  /* padding: 10px; */
}
.text{
  font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  margin-top: 5px;
  padding: 0px 10px 0px 0px;
  color: black;
}
/* input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 12px;
    background-color: white;
    background-image: url('../../images/searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
input[type=text]:focus {
    width: 100%;
}
@media (max-width:500px){
  input[type=text]{
    width: 2px;
    background-image: url('../../images/searchicon.png');
  }
  input[type=text]:focus {
    width: 100%;
}
} */
h1{
  padding-left:10px;
  font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}

</style>
@endsection
@section('content')


<div>
<h1>Videos</h1>
<!-- <form class="float-right mt-2">
  <input type="text" name="search" placeholder="Search..">
</form> -->
</div>
<h5 style="padding-left: 10px; font-family:serif;">Don't miss out any of our event videos, watch our previous videos and look forward to our upcoming events. </h5>
<div class="card mt-2 px-2">
  <div class="card-header" >   
    <h3 class="card-title"> Upcoming Events</h3>
  </div>
  <div class="row pt-3" >  
    <div class="col-md-3 gallery">
      <a href="#" target="_parent">
        <img src="{{asset('videos/video.png')}}" alt="" style=" width:100%; height: auto">
        <span class="play"><i class="fa fa-play"></i></span>
        <div class="text">
          <h5 class="float-left">OSTraining Event</h5> <i class="float-right">tomorrow</i>
          <p style="clear:both"> Description of the video </p>
        </div>
      </a>
    </div>
    <div class="col-md-3 gallery">
      <!-- <a href="{{asset('videos/oicvideo.mp4')}}" target="_parent"> -->
        <img src="{{asset('videos/video2.png')}}" alt="" style=" width:100%; height: auto">
        <span class="play"><i class="fa fa-play"></i></span>
        <div class="text">
        <h5 class="float-left">OICTraining Event</h5> <i class="float-right">saturday</i>
          <p style="clear:both"> Description of the video </p>
        </div>
      <!-- </a> -->
    </div>
    <div class="col-md-3 gallery ">
      <!-- <a href="{{asset('videos/wordpress_1607771314.mp4')}}" target="_parent"> -->
        <img src="{{asset('videos/video.png')}}" alt="" style=" width:100%; height: auto">
        <span class="play"><i class="fa fa-play"></i></span>
        <div class="text">
        <h5 class="float-left">OSTraining Event</h5> <i class="float-right">{{date('12-10-21')}}</i>
          <p style="clear:both"> Description of the video </p>
        </div>
      <!-- </a> -->
    </div>
    <div class="col-md-3 gallery">
      <a href="#">
        <img src="{{asset('videos/video2.png')}}" alt="" style=" width:100%; height: auto">
        <span class="play"><i class="fa fa-play"></i></span>
        <div class="text">
        <h5 class="float-left">OSTraining Event</h5> <i class="float-right">5hours ago</i>
          <p style="clear:both"> Description of the video </p>      
        </div>
      </a>
    </div>
  </div>
</div>

<div class="row mt-3">
    <div class="col-12">            
    <div class="card">
            <div class="card-header">
              <h3 class="card-title">Previous Videos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Video</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description(s)</th>                    
                    <th>Event Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody> 
                  <tr>
                    <td><img src="{{asset('videos/video.png')}}" alt="" style=" width:100px; height:70px"></td>
                    <td>Ostraining</td>
                    <td>Karele Event</td>
                    <td>Training of karele oodua staffs video</td>
                    <td>{{date('12-01-21')}}</td>
                    <td><a href="{{asset('videos/video.mp4')}}" target="_parent">View</a></td>
                  </tr>
                  <tr>
                    <td><img src="{{asset('videos/video2.png')}}" alt="" style=" width:100px; height:70px"></td>
                    <td>OICTrainig</td>
                    <td>Karele Event</td>
                    <td>Training of karele oodua affliated staffs video</td>
                    <td>{{('yesterday')}}</td>
                    <td><a href="{{asset('videos/oicvideo.mp4')}}" target="_parent">View</a></td>
                  </tr>
                  <tr>
                    <td><img src="{{asset('videos/video.png')}}" alt="" style=" width:100px; height:70px"></td>
                    <td>Ostraining</td>
                    <td>Karele Event</td>
                    <td>Training of karele oodua staffs video</td>
                    <td>{{('2hours ago')}}</td>
                    <td><a href="{{asset('videos/video.mp4')}}" target="_parent">View</a></td>
                  </tr>
                  <tr>
                    <td><img src="{{asset('videos/video2.png')}}" alt="" style=" width:100px; height:70px"></td>
                    <td>Ostraining</td>
                    <td>Karele Event</td>
                    <td>Training of karele oodua staffs video</td>
                    <td>{{date('02-06-21')}}</td>
                    <td><a href="{{asset('videos/oicvideo.mp4')}}" target="_parent">View</a></td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Video</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description(s)</th>                    
                    <th>Event Date</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

@endsection
@section('script')
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection
