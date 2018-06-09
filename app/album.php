<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table ='albums';

    protected $fillable =array('user_id','album_name','description','cover_image');
    
    public function images(){
        return $this->has_Many('App\Image');
    }

}
