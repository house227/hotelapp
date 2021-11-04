<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roomgroup extends Model{

    public function rooms(){
        // roomインスタンスが取り出せるようになる。
        return $this->hasMany('App\room');
    }
    
}
