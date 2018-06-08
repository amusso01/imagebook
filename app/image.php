<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected $table = 'images';
  
    protected $fillable = array('album_id','description','image_name');

    public function album(){
        return $this->belongsTo('App/album');
    }
}
