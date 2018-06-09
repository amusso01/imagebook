<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    // Auth middleware access granted to users
    public function __construct()
    {
    $this->middleware('auth');
    }
}
