<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest{

    public function authorize(){

        if($this->path() == 'login'){
            return true;
        }else{
            return false;
        }
    }




    public function rules(){
        return [
            'mail' => 'email|required',
            'tel' => 'required|numeric|digits_between:9,11',
        ];
    }


        //メッセージの編集
        public function messages(){
            return[
                'mail.email'  => 'メールアドレスの形式を確認して下さい。',
                'mail.required' => 'メールアドレスの入力は必須項目です。',
                'tel.required' => '電話番号は必須です。',
                'tel.numeric' => '電話番号は整数で入力して下さい。',
                'tel.digits_between' => '電話番号の形式を確認して下さい。'
            ];
        }
}
