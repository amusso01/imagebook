@extends('layouts.app')

@section ('content')

<section class="jumbotron jumbotron-fluid text-center">


    
    <div class="container">
       
            <div class="col-sm-12 col-md-6">
                <img class="img-fluid img-thumbnail" src="{{url('storage/album_covers').'/'.$album->cover_image}}" alt="Gallery {{$album->album_name}}">            
            </div>
            <div class="col-sm-12 col-md-6">
                <h1 class="jumbotron-heading">{{$album->album_name}}</h1>
                <p class="lead text-muted">{{$album->description}}</p>
                <p>
                    <a href="#" class="btn btn-primary">Edit Album Info</a>
                </p>
            </div>
            
        
    </div>
</section>

<div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default">    
                <ul class="nav navbar-nav">
                        <li><a href="{{ url()->previous() }}"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span> Go Back</a></li>
                
                        <li><a href="#" data-toggle="modal" data-target="#uploadModal">Upload Image</a></li>
                        
                </ul>      
            </nav>
        </div>
    </div>




@include('inc.modal.upload')


@endsection
