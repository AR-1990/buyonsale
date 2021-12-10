<?php

use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\StudentController@index');
Route::post('/add','App\Http\Controllers\StudentController@create');
Route::get('/pelu/{class_id}/{section_id}', 'App\Http\Controllers\StudentController@store')->name('student.mydata');
// Route::post('/show/{foo}/{bar}','App\Http\Controllers\StudentController@show');
Route::post('/show','App\Http\Controllers\StudentController@show');
Route::get('/showdata','App\Http\Controllers\StudentController@js');
