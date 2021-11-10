<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest{
    


    public function authorize(){

        if($this->path() == '/reserve/create'){
            return true;
        }else{
            return false;
        }
    }


    public function rules(){

        return [
            'name' => 'required',
            'mail' => 'email|required',
        ];
    }

        //メッセージの編集
        public function messages(){
            return[
                'name.required' => '氏名の入力は必須項目です。',
                'mail.email'  => 'メールアドレスの形式を確認して下さい。',
                'mail.required' => 'メールアドレスの入力は必須項目です。',
            ];
        }
}
