<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Images;
use Illuminate\Support\Facades\Response;

//Implementation for image manipulation. Not implemented yet

class ManipulateController extends Controller
{
    // Auth middleware access granted to users
    public function __construct()
    {
    $this->middleware('auth');
    }

    public function greyscale($id){
        $image = Images::findOrFail($id);
        $path = storage_path('app/public/images/'.$image->album_id.'/'.$image->image_name);
        
        $imgGreyscale = Image::cache(function($image) use ($path){
            return $image->make($path)->greyscale()->encode('data-url');
        }, 10);

      
        return view('image.edit', compact('imgGreyscale', 'image'));
        
    }

}
