@extends('layouts.app')

@section('content')

@include('inc.dashboard')



<h1 class="my-4 text-center text-lg-left">Album Gallery</h1>

<div class="row text-center text-lg-left">

@if (count($albums) > 0)

  @foreach ($albums as $album)
    <div class="col-lg-3 col-md-4 col-xs-6">
    <a href="{{url('/home/albums',$album->id)}}" class="d-block mb-4  h-100">
        <img class="img-fluid img-thumbnail" src="storage/album_covers/{{$album->cover_image}}" alt="Gallery {{$album->album_name}}">
      </a>
    </div>
  @endforeach

@else
    <p>No Album To Display</p>
@endif


</div>

@include ('inc.pagination')

@endsection
