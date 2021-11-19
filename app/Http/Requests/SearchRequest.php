<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest{

    public function authorize(){

        if($this->path() == 'room/search'){
            return true;
        }else{
            return false;
        }
    }


    public function rules(){
        return [
            'check_in' => 'required',
            'check_out' => 'required',
            'check_in' => 'before:check_out',
            'check_out' => 'after:check_in',
        ];
    }

    //メッセージの編集
    public function messages(){
        return[
            'check_in.required' => '日付の入力は必須です',
            'check_in.before' => '日付の値が不正です',
            'check_out.required' => '日付の入力は必須です',
            'check_out.after' => '日付の値が不正です'
        ];
    }
}
