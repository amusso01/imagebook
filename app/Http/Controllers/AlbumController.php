<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AlbumController extends Controller
{
    // Add auth middleware access granted just to auth users
    public function __construct()
    {
    $this->middleware('auth');
    }

    //return the albums 
    public function getList(){
        $album = Album::with('images')->get();
        return ( $album );
    }

    public function create(){
        return view('album.create');
    }
}
