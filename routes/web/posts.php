<?php

use Illuminate\Support\Facades\Route;


//Route::get('/' ,'AdminsController@index')->name('admin.index');

//Route::get('/post' , 'PostController@index')->name('post.index');

Route::middleware(['auth'])->group(function () {


    Route::delete('post/{post}/destroy' ,'PostController@destroy')->name('posts.destroy');

    Route::patch('post/{post}/update' , 'PostController@update')->name('post.update');

    Route::get('post/{post}/edit' ,'PostController@edit')
        ->name('post.edit');

    Route::get('posts/create' ,'PostController@create')->name('posts.create');

    Route::post('posts/store' ,'PostController@store')->name('post.store');

    Route::get('/posts' ,'PostController@index')->name('posts.index');
});






