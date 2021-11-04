<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reserve extends Model{

    protected $table = 'reservations';

    public function Hoteluser(){
        return $this->belongTo('App\hoteluser');
    }
    
    public function getData(){

            $num_data = '宿泊人数: ' . $this->person_num . '名様';
            $checkin_data =  'チェックイン: ' . $this->check_in;
            $checkout_data = 'チェックアウト: ' . $this->check_out;

        $user_reserved_data = [
            $num_data,
            $checkin_data,
            $checkout_data,
        ];
        
        return    $user_reserved_data; 
    }
}
