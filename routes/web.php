<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('hoteluser', 'HotelController@index');
