
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 ">
            <div class="edit-header">
                <h1 class="my-4 text-center text-lg-left">Edit {{$album->album_name}} Album</h1>
            </div>
            <div class="well well-sm">
                <div class="panel-body">
                    {!!Form::open(['action' => ['AlbumController@update', $album->id], 'method' => 'PUT','enctype' => 'multipart/form-data', 'class' => 'form-horizontal'])!!}
                    <div class="form-group">
                        <span class="col-md-3  text-center">
                            {{Form::label('name', 'Change Name')}}
                        </span>
                        <div class="col-md-7">
                            {{Form::text('name', $album->album_name,['class' => 'form-control'])}}
                        </div>       
                    </div>
                    <div class="form-group">
                        <span class="col-md-3  text-center">
                            {{Form::label('description', 'Change Description')}}
                        </span>
                        <div class="col-md-7">
                            {{Form::textarea('description',$album->description,['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group">
                            <span class="col-md-3  text-center">
                                {{Form::label('cover_image', 'Change Cover Image')}}
                            </span>
                        <div class="col-md-7">
                            {{Form::file('cover_image')}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="btn-group">
                                {{Form::submit('Update', $attributes=['class'=>'btn btn-primary'])}}
                                <button type="button" data-toggle="modal" class="btn btn-danger" data-target="#deleteModal">Delete Album</button>
                            </div>
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>








