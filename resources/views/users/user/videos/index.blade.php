@extends('layouts.users.userlayout')
@section('title', 'Live Video')

@section('content')
<h1>Live Video</h1>
<h1>The video controls attribute</h1>

<video width="320" height="240" controls>
  <source src="movie.mp4" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
  Your browser does not support the video tag.
</video>
@endsection