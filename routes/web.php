<?php


Route::get('/', function () {
    return view('welcome');
});

//新規登録フォーム画面
Route::get('hotel', 'HotelController@new_user_create');
//登録情報確認画面
Route::post('hotel', 'HotelController@post_create_data');

Route::get('hotel/create_db', 'HotelController@next_create');
Route::post('hotel/create_db', 'HotelController@create_db');
