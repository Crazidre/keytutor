<?php

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
    

        if (Auth::check()) {

            return view('home'); 

            
        } else {


            return view('welcome'); 


        }

});

Route::get('/about-us' , function() {

    return view('about'); 

} );

Auth::routes();



Route::middleware(['auth'])->group( function() {

    Route::get('/video/{video}', 'VideoController@show' )->name('video.show');
    Route::get('/post/{post}', 'PostController@show')->name('post.show'); 
    Route::post('/like/{model}' , 'LikeController@like' ); 
    Route::get('/logout' , function() {
        Auth::logout(); 
        return view('welcome'); 
    } );
    Route::get('/profile', function() {

        return view('profile');
    } );
    Route::post('/unlike/{model}' , 'LikeController@unllike' ); 
    Route::post('/comment' , 'CommentController@store' )->name('comment'); 
    Route::post('/comment/edit/{comment}' , 'CommentController@update')->name('comment.edit'); 

} );


Route::get('/home', 'HomeController@index')->name('home');
