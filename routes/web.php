<?php

use App\Http\Controllers\RoomsController;


Route::get('/', 'HotelController@index');

// 管理者用ルート
Route::get('hotel_reserved', 'ReserveController@show_hotel_reserve');

// ログイン画面へのルート
Route::get('loginpage', 'LoginController@index');
Route::post('loginpage', 'LoginController@check');

//新規登録フォーム画面
Route::get('create', 'HotelController@user_create');
//登録情報確認画面
Route::post('create', 'HotelController@confirm_data');


//DB処理からのリダイレクトで飛んでくる
// Route::get('hotel/create_redirect', 'HotelController@next_create');

//DBへユーザー登録処理をする
Route::post('create/create_db', 'HotelController@create_db');

// ユーザーに対する予約を表示
Route::get('reserve', 'ReserveController@show_post');
Route::post('reserve', 'ReserveController@show_post');


// 部屋予約
// (getはバリデーションでエラーが出た時の処理だがセッションが必要なので後回し)
// (postは正常な内容が来た時の更新・登録処理)
Route::get('reserve/confirm', 'ReserveController@confirm');
Route::post('reserve/confirm', 'ReserveController@confirm');

Route::post('reserve/create', 'ReserveController@create');


// 宿泊部屋選択後の内容確認画面
Route::post('room/confirm', 'RoomsController@confirm');


// 部屋検索
Route::get('room/search', 'RoomsController@search_get');
Route::post('room/search', 'RoomsController@search_post');



//部屋追加ページ
Route::get('roomadd', 'RoomsController@add_get');
Route::post('roomadd', 'RoomsController@add_post');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
