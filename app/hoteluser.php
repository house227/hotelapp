<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoteluser extends Model{

    // 一応hoteluserテーブルを使うように指示
    protected $table = 'hotelusers';

    //必須項目にidを入れない
    protected $guarded = array('id', 'updated_at', 'created_at');

    public static $rules = array(
        'name' => 'required',
        'mail' => 'email|required',
        'tel' => 'required|numeric|digits_between:9,11',
    );

    public function reserves(){
        return $this->hasMany('App\reserve');
    }

    public function getData(){
        return  'ID.' . $this->id . ':' . $this->name;
    }
}
