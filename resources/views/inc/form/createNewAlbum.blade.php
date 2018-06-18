
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 create-new">
            <div class="edit-header">
                <h1 class="my-4 text-center text-lg-left">Create New Album</h1>
            </div>
            <div class="well well-sm">
                <div class="panel-body">
                    {!!Form::open(['action' => 'AlbumController@store', 'method' => 'POST','enctype' => 'multipart/form-data'])!!}
                    <div class="form-group">
                        <span class="col-md-3  text-center">
                           {{Form::label('name', 'Name')}}
                        </span>
                        <div class="col-md-7">
                            {{Form::text('name','',['placeholder' => 'Album Name', 'class' => 'form-control'])}}
                        </div>       
                    </div>
                    <div class="form-group">
                        <span class="col-md-3  text-center">
                            {{Form::label('description', 'Description')}}
                        </span>
                        <div class="col-md-7">
                            {{Form::textarea('description','',['placeholder' => 'Album Description', 'class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="col-md-3  text-center">
                            {{Form::label('cover_image', 'Cover Image')}}
                        </span>
                        <div class="col-md-7">
                            {{Form::file('cover_image')}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="btn-group">
                                {{Form::submit('Create', $attributes=['class'=>'btn btn-primary'])}}
                            </div>
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
    
    
    
    
    
    
    
    
    









