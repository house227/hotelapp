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
use App\reserve;

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
        // 宿泊情報をセッションへ保存
        $request->session()->put('check_in', $request->check_in);
        $request->session()->put('check_out', $request->check_out);

        // 洋室か和室か（1が洋室 2が和室）
        $group = $request->room_group;
        // 宿泊人数
        $num = $request->rest_num;
        // 空の配列
        $rooms_data = array();

        // 未予約かつ、選択された部屋種かつ、宿泊人数が一致する
        // クエリを取得（条件に合う空いている部屋の情報が欲しい）


        // ※全ての部屋情報から予約が被ってる部屋を除く※
        // すでに予約のある部屋データを取る為に、予約IDを取得
        // スコープのチェーンの間に「orWhere」を追加する事で「または」の形に出来る。
        // ！！検索した日が既予約の日を包み込むと予約出来てしまう！！
        $reserved_id = reserve::SearchCheckin($request->check_in)->orWhere->SearchCheckout($request->check_out)
        ->orWhere->SearchCheckReserve($request->check_in,$request->check_out)
        ->get();

        // 中間テーブル経由で上記で取得した予約IDから部屋番号を取得
        // 予約の被っているデータが全て入った$reserved_idをforeachで回し、
        // 空の配列へ部屋番号を入れる。
        // reserve::find($item->id)で予約の被っているレコードを指定し、
        // それに関係する中間テーブルレコードを呼び出し、部屋番号を取り出す
        foreach($reserved_id as $item){
            $rooms_data[] = reserve::find($item->id)->rooms->first()->room_num;
        }
        // 全ての部屋データから「whereNotIn」で予約済の部屋を除いて取得
        // スコープを追加して部屋種と人数を絞る
        // ！！第２引数は配列じゃないといけない！！
        $rooms_data = room::whereNotIn('room_num', $rooms_data)->
            SearchGroup($group)->SearchNum($num)->get();


        // 上記で作成した空き部屋検索結果を使い、別テーブルにある
        // 部屋名を検索しクエリを取得
        $search_room_name = roomgroup::SearchRoomNum($rooms_data)->get();

        

        $datas = [
            'room_num' => $rooms_data,
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
    public function confirm(Request $request){
                // 部屋情報をセッションへ保存
        $request->session()->put('room_num', $request->num);
        $request->session()->put('room_name', $request->name);
        $request->session()->put('room_people', $request->people);
        return view('reserve.confirm_reserve');
    }
}
