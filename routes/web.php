<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('hotel', 'HotelController@edit');
Route::post('hotel', 'HotelController@edit_post');
