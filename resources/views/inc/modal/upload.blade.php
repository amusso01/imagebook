<!-- Modal -->
<div id="uploadModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Upload Image</h4>
        </div>
        <div class="modal-body">
            <!-- Form -->
            {!!Form::open(['class' => 'dropzone', 'action' => 'ImageController@store', 'id' => 'uploadImage', 'method' => 'POST','enctype' => 'multipart/form-data'])!!}

            <div class="form-group">
                <div class="fallback">
                    {{Form::label('image_name', 'Select Image:')}}
                    {{Form::file('image_name')}}
                </div>
            </div>
            {{Form::hidden('album_id', $album->id)}}
            {!!Form::close()!!}
            
        </div>
    
        </div>
    
    </div>
</div>