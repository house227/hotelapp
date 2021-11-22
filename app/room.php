<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\roomgroup;
use Carbon\Carbon;

class room extends Model{
    protected $guarded = array('id');


    // belongToManyメソッドでroomモデルにメソッドを定義し、
    // 多対多のリレーションの為reservationモデルをリレーション
    public function reserves(){
        return $this->belongsToMany('App\reserve', 'reserve_room', 'room_id', 'reservation_id');
    }



    public function roomgroup(){
        return $this->belongsTo('App\roomgroup');
    }


    // チェックイン/チェックアウト日を引数に、チェックイン可能か調べるスコープ
    public function scopeSearchCheckin($query, $check_in, $check_out){
        // 引数のINが予約のINよりも前で かつ 引数OUTが予約INよりも前
        // または
        // 引数INが予約OUTより先で かつ 引数OUTが予約OUTよりも先
        // でもデータベースから引っ張るから違うかも
        // どこかでIF文使った方が？ 

        // 既予約の期間内に申し込みのチェックインが入る部屋IDを取得。
        $data = reserve::where('check_in', '>=', $check_in)->where('check_out', '<=', $check_in)->
        orwhere('check_in', '>=', $check_out)->where('check_out', '<=', $check_out)->
        pluck('id');
    }


    public function scopeSearchNum($query, $num){
        // pluck()でカラム値をリストで取得
        $people = roomgroup::where('room_people', '>=', $num)->pluck('id');
        
            return $query->whereIn('roomgroup_id', $people);

    }


    // 部屋種を検索するスコープ
    public function scopeSearchGroup($query, $group){

        // 洋風か和風かの選別
        // 部屋種テーブルから洋風/和風を含む部屋種のIDを取得したい

        // pluck('id')で検索結果から[idカラム]の値をリストで取得
        $room_group = roomgroup::where('room_name', 'Like', '%' . $group . '%' )
        ->pluck('id');

                // whereInでリスト化された[id]と合うレコードを複数返す
                return $query->whereIn('roomgroup_id', $room_group);
        
    }

    public function scopeSearchReserved($query, $reserved){
        // 予約済みかどうかを調べる。
        return $query->where('reserved', $reserved);
    }

    // public function scopeSearchNumber($query, $people){
        
    //     return $query->where('reserved', $people);
    // }




    // public static $rules = array(
    //     'roomgroup_id' => 'required',
    //     'room_num' => 'required'|'numeric',
    // );
    
}
