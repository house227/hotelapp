<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model{
    protected $guarded = array('id');

    public function roomgroup(){
        return $this->belongTo('App\roomgroups');
    }

    public function scopeSearchNumber($query, $people, $room_group){
        $num = roomgroup::where('room_people', '<=', $people)->where('room_name', 'Like', '%' . $room_group . '%' )->value('id');
        foreach($num as $id){
            
        }
        return $query->where('', $people);
    }


    // 部屋種を検索するスコープ
    public function scopeSearchGroup($query, $room_group){

        // 洋風か和風かの選別
        // 部屋種テーブルから洋風/和風を含む部屋種のIDを取得したい
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
