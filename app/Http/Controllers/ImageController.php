<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Images;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    // Auth middleware access granted to users
    public function __construct()
    {
    $this->middleware('auth');
    }

    //Create
    public function create($id){
        return view('image.create');
    }

    //Store image
    public function store(Request $request){
        
        //Validate image 
        $validateData = $request->validate([
            'image_name'    => 'image',
        ]);
        
        //Get input request
        $image = $request->file('image_name');
        $album_id = $request->input('album_id');

        //Get file name with extension
        $image_name_ext = $image->getClientOriginalName();
            
        //Get just Filename
        $filename = pathinfo($image_name_ext, PATHINFO_FILENAME);
        
        //Get extension
        $extension = $image->getClientOriginalExtension();
        
        //Create new filename to store
        $filename_to_store = $filename.'_'.time().'.'.$extension;
        //Create new thumbnail to store
        $thumbnail='thumb_'.$filename_to_store;
        
        //Storage folder path
        $storage_path = storage_path('app/public/images/'.$album_id);

        if(!is_dir($storage_path)){
            mkdir($storage_path,0775,true);
        }
       
        //Upload to path
        $image_uploaded = Image::make($request->file('image_name'))->save($storage_path.'/'.$filename_to_store);
        //Upload thumbnail to path
        $thumb_uploaded = Image::make($request->file('image_name'))->fit(300)->save($storage_path.'/'.$thumbnail);

      


         //Create Image
         $pic = new Images;
         $pic->image_name = $filename_to_store;
         $pic->album_id = $album_id;
 
         $pic->save();
 
         return redirect()->back();

    }
}
