<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Images;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AlbumController;

class ImageController extends Controller
{
    // Auth middleware access granted to users
    public function __construct()
    {
    $this->middleware('auth');
    }

    //Return the extension of an image
    public function mime ($image)
    {
        $mime = Image::make($image)->mime();
        $mime_array = explode('/', $mime);
      
        return $mime_array[1];
    }

    //Create
    public function create($id)
    {
        return view('image.create');
    }

    //Store image
    public function store(Request $request)
    {
        //Validate image 
        $validateData = $request->validate([
            'image_name'    => 'image',
        ]);
        
        //Get input request
        $image = $request->file('image_name');
        $album_id = $request->input('album_id');

        //Create new filename for image and thumbnail
        //method newImageName @return the unique imagename
        $filename_to_store = AlbumController::newImageName($image);
        $thumbnail='thumb_'.$filename_to_store;
        
        //Storage folder path
        $storage_path = storage_path('app/public/images/'.$album_id);

        //create dir if not exist
        if(!is_dir($storage_path)){
            mkdir($storage_path,0775,true);
        }
       
        //Upload to path
        $image_uploaded = Image::make($request->file('image_name'))->save($storage_path.'/'.$filename_to_store);
        //Upload thumbnail to path
        $thumb_uploaded = Image::make($request->file('image_name'))->fit(280)->save($storage_path.'/'.$thumbnail);


         //Create and save Image model
         $pic = new Images;
         $pic->image_name = $filename_to_store;
         $pic->album_id = $album_id;
 
         $pic->save();

         //return the image the response is handle with javascritp
         return $pic;
    }

    
    //delete
    public function destroy($id)
    {
        $image_to_delete = Images::findOrFail($id);
        $album_id = $image_to_delete->album_id;
        $image_to_delete->delete();

        return redirect('home/albums/'.$album_id)->with('success', 'The image has been deleted');
    }

    //edit
    public function edit($id)
    {
        $image=Images::findOrFail($id);

        return view('image.edit', compact('image'));
    }

    //download
    public function download($id)
    {
        $image = Images::findOrFail($id);
        $image_to_download = storage_path('App/public/images/'.$image->album_id.'/'.$image->image_name);
        $mime = $this->mime($image_to_download);
        $name = 'imageBook_'.$image->id.'.'.$mime;
        
        return response()->download($image_to_download, $name);
    }
}
