<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http_Requests_RoomRequest;
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
    public function search_post(Request $request)
    {
        //reservedで予約済みか否か（yes=予約済み no=未）
        $reserved = 'no';
        // 洋室か和室か（1が洋室 2が和室）
        $room_group = $request->room_group;
        // 宿泊人数
        $people = $request->rest_num;
        
        $search_data = room::SearchReserved($reserved)->SearchGroup($room_group)->get();

        return view('room.find', ['datas' => $search_data]);
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
}
