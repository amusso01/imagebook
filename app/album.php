<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Album extends Model
{
    protected $table ='albums';

    protected $fillable =array('user_id','album_name','description','cover_image');

    public function delete(){
        if(file_exists(storage_path('app/public/images/'.$this->id))){
            Storage::deleteDirectory('/public/images/'.$this->id);
        }

        if(file_exists(storage_path('app/public/album_covers/'.$this->cover_image)) && $this->cover_image !== 'albumCover.jpg'){
            Storage::delete('/public/album_covers/'.$this->cover_image);
        }

        parent::delete();
    }
    
    public function images(){
        return $this->has_Many('App\Images');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
