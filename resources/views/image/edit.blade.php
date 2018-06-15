@extends('layouts.app')

@section('imageEdit')

@include('inc.editNavBar')

<div class="container">
    <div class="row">
        <figure>
            <img class="img-responsive center-block" src="/storage/images/{{$image->album_id.'/'.$image->image_name}}" alt="">
        </figure>
    </div>
    <div class="row">
        <div class="btn-group btn-justified pull-right">
            <a class="btn btn-default btn-primary " href="#">Save</a>
            <a class="btn btn-default btn-danger" href="#">Delete</a>
        </div>
        <a class="btn btn-default  pull-left" href="#">Cancel</a>  
    </div>
</div>


@endsection

