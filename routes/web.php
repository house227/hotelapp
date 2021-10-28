<?php


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

//DBへ登録処理をする
Route::post('create/create_db', 'HotelController@create_db');


// 予約画面へのルート
Route::get('reserve', 'ReserveController@index');