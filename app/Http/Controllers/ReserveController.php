<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ReserveRequest;

use App\reserve;
use App\hoteluser;
use App\room;
use App\roomgroup;

class ReserveController extends Controller{



    // 新規予約画面
    public function add_index(){
        return view('reserve.new_reserve');
    }

    public function show_post(Request $request){

        // hoteluserモデルに定義したreservesメソッドを呼び出し、
        // hoteluserに紐づく全ての予約を取得
        $reserves = hoteluser::find(session('user_id'))->reserves;

        // 多対多を使って追加の情報を取得


        return view('reserve.reserve', ['reserved_data' => $reserves]);
    }




    //ID取得の為のDB参照と、予約DBへの新規登録と部屋DB情報の更新 
    public function create(Request $request){

        

        // ユーザー情報の取得
        $db_name = hoteluser::where('name', session('user_name'))->value('name');
        $db_mail = hoteluser::where('mail', session('user_mail'))->value('mail');

        if(isset($db_mail) && isset($db_name)){
            // $user_id = hoteluser::where('name', session('user_name'))->
            // where('mail', session('user_mail'))->value('id');

            $room_data = room::where('room_num', session('room_num'))->first();
            $room_id = $room_data->id;

            $room_price = roomgroup::where('id', $room_data->roomgroup_id)->value('price');

            // reservationテーブル用
            $reserve_form = [
                'hoteluser_id' => session('user_id'),
                'person_num' => session('rest_num'),
                'check_in' => session('check_in'),
                'check_out' => session('check_out'),
            ];
            

            


            // reservationsテーブル(予約)に登録データを新規追加
            $reserve = new reserve;
            $reserve_data = $reserve_form;
            unset($reserve_data['_token']);
            $reserve->fill($reserve_data)->save();

            // roomsテーブルの予約欄を「yes」に変更する
            $room = room::find($room_id);
            $room->reserved = 'yes';
            $room->save();


            // 中間テーブルへデータを保存
            
            //上のコードで予約テーブルには新たな予約が入っているので、最新の予約を取得
            // last()で最後のデータを取得
            $reserve_last_id = reserve::pluck('id')->last();
            $reserve_room = reserve::find($reserve_last_id);
            // 途中
            $room_num = '100';
            $reserve_room->rooms()->attach(
                ['reservation_id' => $reserve_last_id],
                ['room_id' => $room_id],
            );
            $reserve_room->rooms()->updateExistingPivot();



            // 予約完了ページ用

            return view('reserve.success');
        }else{
            // 名前とメールアドレスが一致しなかった時の処理
            
            return view('room.room_reserve');
        }
    }
    
}
