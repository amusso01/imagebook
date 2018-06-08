<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    protected $table ='albums';

    protected $fillable =array('user_id','album_name','description','cover_image');
    
    public function images(){
        return $this->has_many('App/image');
    }

}
