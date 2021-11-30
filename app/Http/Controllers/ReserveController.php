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

        return view('reserve.reserve', ['reserved_data' => $reserves]);
    }




    //ID取得の為のDB参照と、予約DBへの新規登録と部屋DB情報の更新 
    public function create(Request $request){

        // ユーザー情報の取得
        $db_name_id = hoteluser::where('name', session('user_name'))->value('id');
        $db_mail_id = hoteluser::where('mail', session('user_mail'))->value('id');

        if($db_mail_id === $db_name_id){
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




            // 中間テーブルへデータを保存
            
            //$reserve_last_id: 上のコードで予約テーブルには新たな予約が入っているので、最新の予約を取得
            // last()で最後のデータを取得
            $reserve_last_id = reserve::pluck('id')->last();
            $reserve_room = reserve::find($reserve_last_id);
            
            // 中間テーブルの最後のレコードの「id」を取得
            $last_id = DB::table('reserve_room')->pluck('reservation_id')->last();


            // attachを使い中間テーブルへデータの追加
            // 最新の予約の情報を中間テーブルへ保存する為$reserve_roomを使用し
            // リレーションしているreserveモデルのrooms()へattach()
            // 中間テーブルの$last_id番(最新の行)へ配列内のデータを入れる
            // attachなので同じ値があるかの確認は無し
            $reserve_room->rooms()->attach([
                $last_id => [
                    'reservation_id' => $reserve_last_id,
                    'room_id' => $room_id,
                    'room_num' => session('room_num'),
                    'check_in' => session('check_in'),
                    'check_out' => session('check_out'),
                    'price' => $room_price
                ]
            ]
            
            );

            // 予約完了ページ用
            return view('reserve.success');
        }else{
            // 名前とメールアドレスが一致しなかった時の処理
            return view('room.room_reserve');
        }
    }

    // 管理人用予約確認ページ
    public function show_hotel_reserve(Request $request){

        // ※全予約を取得して送る※
        // 編集中
        // EagerローディングによりDBアクセス増加のN+1問題の対応
        // withを使う事で必要な情報をまとめてから取得してくれる。引数にはリレーション先
        // 今回引数には中間テーブルとリレーションしているroomsを指定モデルはreserve
        if(isset($request->sort)){
            $sort = $request->sort;
            $reserved = reserve::with('rooms')->orderBy($sort, 'asc')->get();
        }else{
            $reserved = reserve::with('rooms')->orderBy('check_in', 'asc')->get();
        }



        return view('reserve.kanri_reserve', ['reserved' => $reserved]);
    }
    
}
