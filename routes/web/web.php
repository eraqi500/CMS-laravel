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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {

    Route::get('/admin' ,'AdminsController@index')->name('admin.index');
});
Route::get('posts/{post}' , 'PostController@show')->name('post');

//Route::group(['middleware' => 'AdminUser'], function (){
//    Route::resource('admin/edwin/users', 'AdminUsersController');
//});
Route::resource('admin/edwin/users', 'AdminUsersController');




//Route::get('/post' , 'PostController@index')->name('post.index');
//
//Route::get('/post/{id}' , 'PostController@show')->name('post');



//Route::middleware('auth')->group(function (){

//    Route::get('/admin' ,'AdminsController@index')->name('admin.index');
//
//    Route::get('/admin/posts/create' ,'PostController@create')->name('posts.create');
//
//    Route::post('/admin/posts/store' ,'PostController@store')->name('post.store');
//
//
//    Route::get('/admin/posts' ,'PostController@index')->name('posts.index');
//
//    Route::delete('/admin/posts/{post}/destroy' ,'PostController@destroy')->name('posts.destroy');
//
//    Route::patch('/admin/posts/{post}/update' , 'PostController@update')->name('post.update');
//
//    Route::get('/admin/posts/{post}/edit' ,'PostController@edit')
//        ->name('post.edit');

//    Route::get('admin/users/{user}/profile' , 'UserController@show')
//    ->name('user.profile.show');

//    Route::put('admin/users/{user}/update' , 'UserController@update')
//        ->name('user.profile.update');

//    Route::get('admin/users' , 'UserController@index')
//        ->name('users.index');

//    Route::delete('admin/users/{user}/destroy' , 'UserController@destroy')
//        ->name('user.destroy');
//});

//Route::middleware(['role:admin' , 'auth'])->group(function () {
//    Route::get('admin/users' , 'UserController@index')
//        ->name('users.index');
//});
//
//Route::middleware(['can:view,user'])->group(function () {
//    Route::get('admin/users/{user}/profile' , 'UserController@show')
//        ->name('user.profile.show');
//});
//

Route::get('/post/{id}' ,
    ['as' => 'home.post' , 'uses' => 'NewPostsController@post']);

Route::resource('admin/newposts','NewPostsController');

Route::resource('admin/categories','CategoriesController');

Route::resource('admin/media', 'MediaController');

Route::resource('admin/comments', 'PostCommentsController');

Route::resource('admin/comments/replies', 'CommentRepliesController');

//Route::get('admin/media/upload' , ['as' => 'admin.media.upload' ,
//    'uses' => 'MediaController@store']);

Route::group(['middleware'=>'auth'], function (){
    Route::post('comment/reply' , 'CommentRepliesController@createReply');
});



