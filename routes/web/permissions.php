<?php

use Illuminate\Support\Facades\Route;

Route::get('/' ,'PermissionController@index')->name('permissions.index');

Route::post('/store','PermissionController@store')->name('permissions.store');

Route::get('/{permission}/edit}','PermissionController@edit')
    ->name('permissions.edit');

Route::put('/{permission}/update','PermissionController@update')
    ->name('permissions.update');

Route::delete('/{permission}/destroy','PermissionController@destroy')
    ->name('permissions.destroy');

