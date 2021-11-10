<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ReserveRequest;

use App\reserve;
use App\hoteluser;

class ReserveController extends Controller{



    // 新規予約画面
    public function add_index(){
        return view('reserve.new_reserve');
    }

    public function show_post(Request $request){

        // hoteluserモデルに定義したreservesメソッドを呼び出し、
        // hoteluserに紐づく全ての予約を取得
        $reserves = hoteluser::find($request->id)->reserves;
        $user_data = DB::table('hotelusers')->where('id', $request->id)->first();

        return view('reserve.reserve', ['data' => $user_data , 'reserved_data' => $reserves]);
    }

    // 予約送信前の確認画面
    public function confirm(Request $request){

        // 空き部屋データを配列に
        $datas= [
            'num' => $request->num,
            'name' => $request->name,
            'people' => $request->people,
        ];

        return view('reserve.confirm_reserve', $datas);
    }


    //ID取得の為のDB参照と、予約DBへの新規登録と部屋DB情報の更新 
    public function create(ReserveRequest $request){

        // ユーザー情報の取得
        $db_name = hoteluser::where('name', $request->name)->value('name');
        $db_mail = hoteluser::where('mail', $request->mail)->value('mail');

        if(isset($db_mail) && isset($db_name)){
            $user_id = DB::table('hotelusers')->where('name', $request->mail)->
            where('mail', $request->mail)->value('id');

            return view('', ['data' => $user_id]);
        }else{
            // 名前とメールアドレスが一致しなかった時の処理
            return view('reserve.confirm_reserve', ['login_error' => '1']);
        }
    }
    
}
