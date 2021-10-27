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
            'name' => $request->name,
            'mail' => $request->mail,
            'tel' => $request->tel,
        ];
        DB::table('hotelusers')->insert($param);
        //とりあえず登録画面へ返す。
        return redirect('/hotel/create_db');
    }

    public function finish_db_create(){
        return view('hotel.finish_create');
    }
}
