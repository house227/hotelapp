<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ReserveRequest;

use App\reserve;
use App\hoteluser;
use App\room;

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
        $db_name = hoteluser::where('name', $request->user_name)->value('name');
        $db_mail = hoteluser::where('mail', $request->mail)->value('mail');

        if(isset($db_mail) && isset($db_name)){
            $user_id = hoteluser::where('name', $request->user_name)->
            where('mail', $request->mail)->value('id');

            $room_num = room::where('room_num', $request->num)->value('id');

            // reservationテーブル用
            $reserve_form = [
                'hoteluser_id' => $user_id,
                'person_num' => $request->person_num,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
            ];
            

            


            // reservationsテーブル(予約)に登録データを新規追加
            $reserve = new reserve;
            $reserve_data = $reserve_form;
            unset($reserve_data['_token']);
            $reserve->fill($reserve_data)->save();

            // roomsテーブルの予約欄を「yes」に変更する
            $room = room::find($room_num);
            $room->reserved = 'yes';
            $room->save();

            // 予約完了ページ用
            $datas = $request->all();
            $datas += ['id' => $user_id];

            return view('reserve.success', $datas);
        }else{
            // 名前とメールアドレスが一致しなかった時の処理
            // 一致しなかった場合はセッションを使う必要があるようなので後回し
            $datas= [
                'num' => $request->num,
                'name' => $request->name,
                'people' => $request->people,
            ];
            return view('reserve.confirm_reserve',$datas);
        }
    }
    
}
