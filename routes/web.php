<?php

use App\Http\Controllers\RoomsController;

Route::get('/', function () {
    return view('home.index');
});

// ログイン画面へのルート
Route::get('login', 'LoginController@index');
Route::post('login', 'LoginController@check');

//新規登録フォーム画面
Route::get('create', 'HotelController@user_create');
//登録情報確認画面
Route::post('create', 'HotelController@confirm_data');


//DB処理からのリダイレクトで飛んでくる
// Route::get('hotel/create_redirect', 'HotelController@next_create');

//DBへユーザー登録処理をする
Route::post('create/create_db', 'HotelController@create_db');

Route::post('reserve', 'ReserveController@show_post');




// 部屋検索
Route::get('room/search', 'RoomsController@search_get');
Route::post('room/search', 'RoomsController@search_post');

//部屋追加ページ
Route::get('roomadd', 'RoomsController@add_get');
Route::post('roomadd', 'RoomsController@add_post');