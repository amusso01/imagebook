<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Album;


class AlbumController extends Controller
{
    // Auth middleware access granted to users
    public function __construct()
    {
    $this->middleware('auth');
    }
    
    //Create
    public function create(){
        return view('album.create');
    }

    public function show($id) {
        $album = Album::find($id);
        return view('album.show')->with('album', $album);
    }


    // Store
    public function store(Request $request){
        
        //Validate request 
        $validateData = $request->validate([
            'name'          => 'required',
            'cover_image'   => 'image|max:1999',
            'description'   => 'required',
        ]);

        
        //Get input request
        $name = $request->input('name');
        $description = $request->input('description');
        $cover_image = $request->file('cover_image');
        $user_id = Auth::id();
        
        
        //Check if cover image upload
        if($cover_image){
            //Get file name with extension
            $cover_image_name_ext = $cover_image->getClientOriginalName();
            
            //Get just Filename
            $filename = pathinfo($cover_image_name_ext, PATHINFO_FILENAME);
            
            //Get extension
            $extension = $cover_image->getClientOriginalExtension();
            
            //Create new filename to store
            $filename_to_store = $filename.'_'.time().'.'.$extension;
            //Upload to path
            $path = $cover_image->storeAs('public/album_covers', $filename_to_store);
        }else{
            $filename_to_store = 'albumCover.jpg';
        }
        //Create Album
        
        $album = new Album;
        $album->album_name = $name;
        $album->description = $description;
        $album->user_id = $user_id;
        $album->cover_image = $filename_to_store;
        

            

            $album->save();

            return redirect('home/albums/create')->with('success', 'Album succesfully created');
    }
}
