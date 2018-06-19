@extends('layouts.app')

@section ('content')

<section class="jumbotron jumbotron-fluid text-center">
        @if (Session::has('success'))
        <div class="alert-success">
            <p>{{Session::get('success')}}</p>
        </div>
         @endif
    <div class="container">
       
            <div class="col-sm-12 col-md-6">
                <img class="img-responsive img-thumbnail" src="{{url('storage/album_covers').'/'.$album->cover_image}}" alt="Gallery {{$album->album_name}}">            
            </div>
            <div class="col-sm-12 col-md-6">
                <h1 class="jumbotron-heading">{{$album->album_name}}</h1>
                <p class="lead text-muted">{{$album->description}}</p>
                <p>
                    <a href="{{url('home/albums/'.$album->id.'/edit')}}" class="btn btn-primary">Edit Album Info</a>
                </p>
            </div>
        
    </div>
</section>

<div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default">    
                <ul class="nav navbar-nav">
                        <li><a href="{{ url('home') }}"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span> Gallery</a></li>
                
                        <li><a href="#" data-toggle="modal" data-target="#uploadModal">Upload Image</a></li>
                        
                </ul>      
            </nav>
        </div>
    </div>

@include('inc.modal.upload')

<div class="row text-center text-lg-left tz-gallery" id="image-gallery-container">

    @if (count($images) > 0)

        @foreach ($images as $image)

            <div class="col-md-4 col-sm-6">
                <div class="section-box-eleven thumbnail">
                        <figure>
                        <a href="{{url('home/image/'.$image->id.'/edit')}}"><i class="glyphicon glyphicon-cog"></i> Edit</a>
                        </figure>
                        <a href="/storage/images/{{$album->id}}/{{$image->image_name}}"> 
                        <img src="/storage/images/{{$album->id}}/thumb_{{$image->image_name}}" alt="{{$image->id}}-{{$album->album_name}}" class="img-responsive"/>
                        </a>
                    </div>
                </div>
                
        @endforeach
        
    @else
        <h3 id="noImg">No Image To Display Upload One!!</h3>
    @endif

    
</div>

    <div class="pagination justify-content-center">
        {{$images->links()}}
    </div>


@endsection
