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



Route::get('/', function () {
    if(Auth::guest()){
        return view('welcome');
    }
    return redirect('home');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::resources([
    '/home/albums'  => 'AlbumController',
    'home/image'    => 'ImageController',
    ]);
// Route::get('/home/albums/create', 'AlbumController@create');
// Route::post('/home/albums/store', 'AlbumController@store');
Route::post('/home/image/store', 'ImageController@store')->name('image.store');
Route::get('home/albums',[
    'as'    => 'albums.store',
    'uses'  => 'AlbumController@store'
]);

