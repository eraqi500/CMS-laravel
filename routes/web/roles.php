<?php
use Illuminate\Support\Facades\Route;

Route::get('/' ,'RoleController@index')->name('roles.index');

Route::post('/store' ,'RoleController@store')->name('roles.store');

Route::delete('/{role}/destroy', 'RoleController@destroy')->name('roles.destroy');

Route::get('/{role}/edit', 'RoleController@edit')->name('roles.edit');

Route::put('/{role}/update', 'RoleController@update')->name('roles.update');

Route::put('/{role}/attach', 'RoleController@attach_permission')
    ->name('role.permission.attach');

Route::put('/{role}/detach', 'RoleController@detach_permission')
    ->name('role.permission.detach');
