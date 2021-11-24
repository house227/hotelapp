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
        
        $mail = $request->mail;
        $tel = $request->tel;

        //モデルを使って検索
        $db_mail = hoteluser::where('mail', $mail)->value('mail');
        $db_tel = hoteluser::where('tel', $tel)->value('tel');

        // 管理者の場合のログイン先
        

        //モデルを使わない方法
        // $db_mail = DB::table('hotelusers')->where('mail', $mail)->value('mail');
        // $db_tel = DB::table('hotelusers')->where('tel', $tel)->value('tel');

        if(isset($db_mail) && isset($db_tel)){
            $all_data = DB::table('hotelusers')->where('mail', $mail)->
                where('tel', $tel)->first();

                // ログイン成功なのでセッションへ情報を保存
                session(['user_id' => $all_data->id]);
                session(['user_name' => $all_data->name]);
                session(['user_mail' => $db_mail]);
                session(['user_tel' => $all_data->tel]);

            return view('login.success');
        }else{
            return view('login.loginpage', ['login_error' => '1']);
        }
    }
}
