@extends('layouts.app')

@section('imageEdit')

@include('inc.editNavBar')

<div class="container">
    <div class="row">
        <figure>
            <img class="img-responsive center-block" src="/storage/images/{{$image->album_id.'/'.$image->image_name}}" alt="">
        </figure>
    </div>
</div>

@include('inc.modal.deleteImage')


@endsection

