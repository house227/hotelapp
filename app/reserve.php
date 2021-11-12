<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reserve extends Model{
    protected $guarded = array('id');
    
    protected $table = 'reservations';


    // 「belongToManyメソッド」でreservationモデルに
    // メソッドを定義し、多対多のリレーションの為
    // roomモデルをリレーション
    
    public function rooms(){

        //「 withPivot()」で中間テーブルのカラムを参照出来る
        return $this->belongsToMany('App\room', 'reserve_room', 'reservation_id', 'room_id')->withPivot('room_num', 'price','check_in', 'check_out');
    }



    public function Hoteluser(){
        return $this->belongTo('App\hoteluser');
    }
    
    public function getData(){

        // reserve.bladeでreserveコントローラにて取得した「IDが一致する予約データ一覧配列」
        // をforeachで回しているので、$thisは予約データが順番に入ってくる（reservesテーブル）

            $num_data =$this->person_num . '名様';


            // 多対多のリレーションを作っている「rooms」を呼び出し
            // 「pivot」で[withPivot]で参照しているカラムへアクセス。
            //中間テーブルに保存されている部屋番号データ「room_num」を取り出す。 
            $room_num = $this->rooms->first()->pivot->room_num . '号室';

            $price = '$' . $this->rooms->first()->pivot->price;
            $check_in =$this->rooms->first()->pivot->check_in;
            $check_out =$this->rooms->first()->pivot->check_out;


        $user_reserved_data = [

            // 部屋番号
            $room_num,
            // 宿泊人数
            $num_data,
            // チェックイン
            $check_in,
            // チェックアウト
            $check_out,
            // 料金
            $price,
            



        ];
        
        return    $user_reserved_data; 
    }
}
