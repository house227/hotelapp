<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use App\hoteluser;

class LoginController extends Controller{
    
    public function index(){
        return view('login.loginpage');
    }

    public function check(LoginRequest $request){
        
        // 受け取ったメアドと電話番号を使いやすいよう仮保存
        $mail = $request->mail;
        $tel = $request->tel;

        //モデルを使って検索
        $db_mail_id = hoteluser::where('mail', $mail)->value('id');
        $db_tel_id = hoteluser::where('tel', $tel)->value('id');

        // 管理者の場合のログイン先
        

        //モデルを使わない方法
        // $db_mail = DB::table('hotelusers')->where('mail', $mail)->value('mail');
        // $db_tel = DB::table('hotelusers')->where('tel', $tel)->value('tel');

        // メアドと電話どちらかが別の人と一致してしまうとエラーが出る
        // ※メアドと番号が同一人物のものか調べる必要がある※

        if($db_mail_id === $db_tel_id){

            $all_data = hoteluser::where('mail', $mail)->
                where('tel', $tel)->where('id', $db_mail_id)->first();

                // ログイン成功なのでセッションへ情報を保存
                session(['user_id' => $all_data->id]);
                session(['user_name' => $all_data->name]);
                session(['user_mail' => $all_data->mail]);
                session(['user_tel' => $all_data->tel]);

            return view('login.success');
        }else{
            return view('login.loginpage', ['login_error' => '1']);
        }
    }
}
