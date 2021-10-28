<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelEditRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http_Requests_HotelEditRequest;

class HotelController extends Controller


{
    // 新規ユーザー登録画面を返す
    public function new_user_create(){
        return view('hotel.user_create', ['msg' => '登録に必要なお客様情報を入力してください']);
    }



    // 登録データ確認画面を返す
    public function post_create_data(HotelEditRequest $request){
        //$requestには送信された入力情報が入っている。
        // $request->○○で取り出し、$user_data配列のキーと結ぶ
        $user_data=[
            'name' => $request->name,
            'mail' => $request->mail,
            'tel' => $request->tel,
        ];
        return view('hotel.create_confirm', $user_data);
    }



    //ユーザー登録をデータベースへ行う
    public function create_db(Request $request){

        $param = [
            'name' => $request->confirm_name,
            'mail' => $request->confirm_mail,
            'tel' => $request->confirm_tel,
        ];
        DB::table('hotelusers')->insert($param);
        //とりあえずリダイレクト
        return redirect('/hotel/create_db');
    }


    //登録処理からリダイレクトされて初期の登録画面へ
    //とりあえず飛ばす。 見分けが付くようにmsgを変更
    public function next_create(){
        return view('hotel.user_create', ['msg' => '登録完了しました']);
    }
}
