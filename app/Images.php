<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Images extends Model
{
    protected $table = 'images';
  
    protected $fillable = array('album_id','image_name');

    public function album(){
        return $this->belongsTo('App\Album');
    }

    public function delete(){
        if(file_exists(storage_path('app/public/images/'.$this->album_id.'/'.$this->image_name))){
            Storage::delete('/public/images/'.$this->album_id.'/'.$this->image_name);
        }
        if(file_exists(storage_path('app/public/images/'.$this->album_id.'/thumb_'.$this->image_name))){
            Storage::delete('/public/images/'.$this->album_id.'/thumb_'.$this->image_name);
        }
        parent::delete();
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
