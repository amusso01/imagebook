
{!!Form::open(['action' => 'AlbumController@store', 'method' => 'POST','enctype' => 'multipart/form-data'])!!}
<div class="form-group">
    {{Form::label('name', 'Name')}}
    {{Form::text('name','',['placeholder' => 'Album Name'])}}
</div>

<div class="form-group">
    {{Form::label('description', 'Description')}}
    {{Form::textarea('description','',['placeholder' => 'Album Description'])}}
</div>

<div class="form-group">
    {{Form::label('cover_image', 'Cover Image')}}
    {{Form::file('cover_image')}}
</div>
{{Form::submit('Create', $attributes=['class'=>'btn btn-primary'])}}
{!!Form::close()!!}