<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Album;
use Intervention\Image\Facades\Image;
use App\Images;
use Illuminate\Support\Facades\Storage;



class AlbumController extends Controller
{
    // Auth middleware access granted to users
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Create file name to store in DB::
    public static function newImageName($imageFile)
    {
         //Get file name with extension
         $cover_image_name_ext = $imageFile->getClientOriginalName();
            
         //Get just Filename
         $filename = pathinfo($cover_image_name_ext, PATHINFO_FILENAME);
         
         //Get extension
         $extension = $imageFile->getClientOriginalExtension();
         
         //Create new filename to store
         $filename_to_store = $filename.'_'.time().'.'.$extension;

         return $filename_to_store;
    }

    //Get Album
    public static function getAlbum()
    {
        $albums=Album::where('user_id', Auth::id() )->paginate(6);

        return $albums;
    }
    
    //Create
    public function create()
    {
        return view('album.create');
    }

    //Show album along with images
    public function show($id) 
    {
        $album = Album::findOrFail($id);

        if($album->user_id == Auth::id()){
            
            $images = Images::where('album_id', $id)->with('user')->paginate(9);
            
            return view('album.show', compact('album', 'images'));
        }else{
            abort(403, 'Unauthorized action!');
        }

    }

    //Edit
    public function edit($album)
    {
        $album=Album::findOrFail($album);
        return view('album.edit', compact('album'));
    }

    //Update
    public function update($album, Request $request)
    {
       //Validate request 
       $validateData = $request->validate([
        'name'          => 'required|max:30',
        'cover_image'   => 'image|max:1999',
        'description'   => 'required|max:500',
    ]);
    
    //find album to update
    $album_to_update = Album::findOrFail($album);
    
    //Get input request
    $name = $request->input('name');
    $description = $request->input('description');
    $cover_image = $request->file('cover_image');

    
    //Check if cover image upload
    if($cover_image){
        if($album_to_update->cover_image !== Album::$defaultCoverImage){
            //delete unused cover_image
            unlink(storage_path('app/public/album_covers/'.$album_to_update->cover_image));
        }
       
        //Create new filename to store
        $filename_to_store = $this->newImageName($cover_image);
        
        //Upload to path
        $image=Image::make($request->file('cover_image'))->fit(280)->save(storage_path('app/public/album_covers/'.$filename_to_store));

        //update DB field
        $album_to_update->cover_image = $filename_to_store;
    }

    //update DB fields
    $album_to_update->album_name = $name;
    $album_to_update->description = $description;

    $album_to_update->save();

    return redirect('home/albums/'.$album_to_update->id)->with('success', 'Album succesfully updated');
    }

    //Delete
    public function destroy($album)
    {
        $album_to_delete = Album::findOrFail($album);
        $name = $album_to_delete->album_name;
        $album_to_delete->delete();

        return redirect('home')->with('success', 'The album '. $name .' has been deleted');
    }
    


    // Store
    public function store(Request $request)
    {
        //Validate request 
        $validateData = $request->validate([
            'name'          => 'required|max:30',
            'cover_image'   => 'image|max:1999',
            'description'   => 'required|max:500',
        ]);

        
        //Get input request
        $name = $request->input('name');
        $description = $request->input('description');
        $cover_image = $request->file('cover_image');
        $user_id = Auth::user()->id;
        
        
        //Check if cover image upload
        if($cover_image){
            
            //Create new filename to store
            $filename_to_store = $this->newImageName($cover_image);
            
            //Upload to path
            $image=Image::make($request->file('cover_image'))->fit(280)->save(storage_path('app/public/album_covers/'.$filename_to_store));
            
            
            // $path = $image->storeAs('public/album_covers', $filename_to_store);
        }else{
            $filename_to_store = Album::$defaultCoverImage ;
        }
        
        //Create Album
        $album = new Album;
        $album->album_name = $name;
        $album->description = $description;
        $album->user_id = $user_id;
        $album->cover_image = $filename_to_store;
        

        $album->save();

        return redirect('home')->with('success', 'Album succesfully created');
    }
}
