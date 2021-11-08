<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\roomgroup;

class room extends Model{
    protected $guarded = array('id');

    public function roomgroup(){
        return $this->belongTo('App\roomgroup');
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
