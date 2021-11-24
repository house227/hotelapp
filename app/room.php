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
        return $this->belongsToMany('App\reserve', 'reserve_room', 'room_id', 'reservation_id')->withPivot('room_num', 'price','check_in', 'check_out');
    }



    public function roomgroup(){
        return $this->belongsTo('App\roomgroup');
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

    
}
