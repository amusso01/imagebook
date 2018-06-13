<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Are you absolutely sure?</h4>
            </div>
            <div class="modal-body">
                <p>This action <strong>cannot </strong>be undone. This will permanently delete the album named <strong>{{$album->album_name}}</strong> and all the images stored inside it.</p>
            </div>
            <div class="modal-footer">

                {!!Form::open(['action' => ['AlbumController@destroy', $album->id], 'method' => 'DELETE'])!!}
                    {{Form::submit('I understand the consequences, delete this album', $attributes=['class'=>'btn btn-danger'])}}
                {!!Form::close()!!}
            </div>
          </div>
        </div>
      </div>