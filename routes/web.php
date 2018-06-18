<?php

use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Get
Route::get('/', function () {
    if(Auth::guest()){
        return view('welcome');
    }
    return redirect('home');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('home/image/{id}/download', 'ImageController@download')->name('image.download');
Route::get('home/albums',[
    'as'    => 'albums.store',
    'uses'  => 'AlbumController@store'
]);

//Auth
Auth::routes();

//Resources
Route::resources([
    '/home/albums'  => 'AlbumController',
    'home/image'    => 'ImageController',
    ]);

//Post
Route::post('/home/image/store', 'ImageController@store')->name('image.store');


// Route::get('home/image/{id}/greyscale', 'ManipulateController@greyscale' ); Implementation for image manipulation

