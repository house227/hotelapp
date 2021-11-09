<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\room;

class roomgroup extends Model{

    public function rooms(){
        // roomインスタンスが取り出せるようになる。
        return $this->hasMany('App\room');
    }
    
    public function scopeSearchRoomNum($query, $datas){
        // 検索された部屋の情報を使い部屋名を取ろうとしたスコープ

        // 空の配列に検索済みの部屋情報から外部キーのみ別配列へ入れ

        $var = array();
        foreach($datas as $data){
            $var[] = $data->roomgroup_id;
        }
        // 新規作成した配列の値を含む部屋種主キーを全て返す
        return $query->whereIn('id', $var);
    }

    public function scopeSearchReserved($query, $reserved){
        $room_reserved = room::where('reserved', $reserved)->pluck('roomgroup_id');
        // 予約済みかどうかを調べる。
        return $query->whereIn('id', $room_reserved);
    }

    public function scopeSearchGroup($query, $group){

        $group_id = roomgroup::where('room_name', 'Like', '%' . $group . '%')->pluck('id');

        return $query->whereIn('room_name', 'Like', '%' . $group . '%');
    }

    public function scopeSearchNum($query, $num){
        // pluck()でカラム値をリストで取得
        
            return $query->whereIn('roomgroup_id', '>=', $num);
    }

}
