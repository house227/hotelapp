<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest{

    public function authorize(){

        if($this->path() == 'roomadd'){
            return true;
        }else{
            return false;
        }
    }


    public function rules(){
        return [
            'roomgroup_id' => 'required',
            'room_num' => 'required|numeric|digits:3',
        ];
    }

    //メッセージの編集
    public function messages(){
        return[
            'roomgroup_id.required' => '部屋種IDの選択は必須項目です。',
            'roomgroup_id.between' => '部屋種IDを選択して下さい',
            'room_num.required' => '部屋番号は必須です。',
            'room_num.numeric' => '部屋番号は整数で入力して下さい。',
            'room_num.digits' => '部屋番号は3桁までです。'
        ];
    }
}
