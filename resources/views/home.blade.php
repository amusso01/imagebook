@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-default">    
            <ul class="nav navbar-nav">
                <li><a href="{{url('home/albums/create')}}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create New Album 
                </a></li>
            </ul>      
        </nav>
    </div>
</div>

@if (Session::has('success'))
        <div class="alert-success">
            <p>{{Session::get('success')}}</p>
        </div>
@endif

<h1 class="my-4 text-center text-lg-left">Album Gallery</h1>

<div class="row text-center text-lg-left tz-gallery">

@if (count($albums) > 0)

  @foreach ($albums as $album)
  
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
          <a href="{{url('/home/albums',$album->id)}}">
              <img src="storage/album_covers/{{$album->cover_image}}" alt="Gallery {{$album->album_name}}">
          </a>
          <div class="caption">
              <h3>{{$album->album_name}}</h3>
              <p class="description">{{$album->description}}</p>
          </div>
      </div>
    </div>

  @endforeach

@else
    <p>No Album To Display</p>
@endif


</div>

@include ('inc.pagination')

@endsection
