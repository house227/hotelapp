<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests_RoomRequest;
use App\Http\Requests\ReserveRequest;
use App\Http\Requests\SearchRequest;
use App\room;
use App\roomgroup;

class RoomsController extends Controller
{


    // 検索画面の表示
    public function search_get()
    {
        return view('room.search');
    }

    // 検索画面からのポスト送信
    public function search_post(SearchRequest $request)
    {
        //reservedで予約済みか否か（yes=予約済み no=未）
        $reserved = 'no';
        // 洋室か和室か（1が洋室 2が和室）
        $group = $request->room_group;
        // 宿泊人数
        $num = $request->rest_num;

        // 未予約かつ、選択された部屋種かつ、宿泊人数が一致する
        // クエリを取得（条件に合う空いている部屋の情報が欲しい）
        $search_room_num = room::SearchReserved($reserved)->
            SearchGroup($group)->SearchNum($num)->get();

        // 上記で作成した空き部屋検索結果を使い、別テーブルにある
        // 部屋名を検索しクエリを取得
        $search_room_name = roomgroup::SearchRoomNum($search_room_num)->get();

        $datas = [
            'room_num' => $search_room_num,
            'room_name' => $search_room_name,
        ];
        
        $request->session()->put('rest_num', $num);
        return view('room.find', $datas);
    }


    // 部屋作成用
    public function add_get()
    {
        return view('room.add');
    }

    public function add_post(RoomRequest $request)
    {
        return view('room.add');
    }

        // 予約送信前の確認画面
        public function reserve(Request $request){

            // 部屋情報をセッションへ保存
            $request->session()->put('room_num', $request->num);
            $request->session()->put('room_name', $request->name);
            $request->session()->put('room_people', $request->people);
    
            return view('room.room_reserve');
        }


        public function confirm(ReserveRequest $request){

            // 部屋情報をセッションへ保存
            $request->session()->put('check_in', $request->check_in);
            $request->session()->put('check_out', $request->check_out);
    
            return view('reserve.confirm_reserve');
        }
}
