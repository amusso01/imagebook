
{!!Form::open(['action' => 'ImageController@store', 'method' => 'POST','enctype' => 'multipart/form-data'])!!}

<div class="form-group">
    {{Form::label('description', 'Description')}}
    {{Form::textarea('description','',['placeholder' => 'Image Description'])}}
</div>

<div class="form-group">
    {{Form::label('cover_image', 'Cover Image')}}
    {{Form::file('cover_image')}}
</div>
{{Form::hidden('album_id', '$album->id')}}
{{Form::submit('submit', $attributes=['class'=>'btn btn-primary'])}}
{!!Form::close()!!}