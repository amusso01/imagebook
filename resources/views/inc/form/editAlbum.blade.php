
{!!Form::open(['action' => ['AlbumController@update', $album->id], 'method' => 'PUT','enctype' => 'multipart/form-data'])!!}
<div class="form-group">
    {{Form::label('name', 'Change Name')}}
    {{Form::text('name', $album->album_name,[])}}
</div>

<div class="form-group">
    {{Form::label('description', 'Change Description')}}
    {{Form::textarea('description',$album->description,[])}}
</div>

<div class="form-group">
    {{Form::label('cover_image', 'Change Cover Image')}}
    {{Form::file('cover_image')}}
    <img src="{{url('storage/album_covers/'.$album->cover_image)}}" alt="">
</div>
{{Form::submit('Update', $attributes=['class'=>'btn btn-primary'])}}
<button type="button" data-toggle="modal" class="btn btn-danger" data-target="#deleteModal">Delete Album</button>

{!!Form::close()!!}

