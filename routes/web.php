<?php

use Illuminate\Support\Facades\Route;

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

//Pages
Route::get('/','PagesController@index');
Route::get('/about','PagesController@about');

//Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//Posts
Route::resource('posts','PostsController');

//Komentari
Route::post('/posts/{post}/comment', 'CommentsController@store');
Route::delete('/comment/{comment}', 'CommentsController@destroy');
Route::get('/posts/comment/{comment}', 'CommentsController@show', function($id){
    return view('posts.comment')->with('id',$id);
});

//Predmeti
Route::resource('predmeti','PredmetiController');
Route::get('/predmeti/{predmet}/objave','PredmetiController@objave');
Route::get('/predmeti/{predmet}/napravi', 'PredmetiController@napraviObjavu');
//Pitanja
Route::resource('pitanja','PitanjaController');
//Auth
Auth::routes();
//Odgovori
Route::resource('odgovori','OdgovoriController');
//Testovi
Route::resource('testovi','TestoviController');
//Rezultati
Route::resource('rezultati', 'RezultatiController');
//Users
Route::resource('users','UserController');



