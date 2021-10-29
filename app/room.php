<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model{
    protected $guarded = array('id');

    public static $rules = array(
        'roomgroup_id' => 'required',
        'room_num' => 'required'|'numeric',
    );
    
}
