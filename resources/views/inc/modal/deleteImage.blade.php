{{-- {!!Form::open(['action' => ['ImageController@destroy', $image->id], 'method' => 'DELETE'])!!}
{{Form::submit('Delete', $attributes=['class'=>'btn btn-danger'])}}
{!!Form::close()!!} --}}


<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Image</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure to delete this image?</p>
            </div>
            <div class="modal-footer">
                {!!Form::open(['action' => ['ImageController@destroy', $image->id], 'method' => 'DELETE'])!!}
                {{Form::submit('Delete', $attributes=['class'=>'btn btn-danger'])}}
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!!Form::close()!!}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->