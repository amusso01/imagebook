<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';
  
    protected $fillable = array('album_id','image_name');

    public function album(){
        return $this->belongsTo('App\Album');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
