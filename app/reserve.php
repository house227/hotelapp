<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reserve extends Model{

    protected $table = 'reservations';

    public function hoteluser(){
        return $this->belongTo('App\hoteluser');
    }
    
    public function getData(){
        return '宿泊人数:' . $this->person_num . '<br>チェックイン日' . 
            $this->check_in . '<br>チェックアウト日' . $this->check_out;
    }
}
