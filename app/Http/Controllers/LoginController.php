<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller{
    
    public function index(){
        return view('login.loginpage');
    }

    public function check(LoginRequest $request){
        
        $mail = $request->mail;
        $tel = $request->tel;


        $db_mail = DB::table('hotelusers')->where('mail', $mail)->value('mail');
        $db_tel = DB::table('hotelusers')->where('tel', $tel)->value('tel');

        if(isset($db_mail) && isset($db_tel)){
            $all_data = DB::table('hotelusers')->where('mail', $mail)->first();
            return view('login.success', ['data' => $all_data]);
        }else{
            return view('login.loginpage', ['login_error' => '1']);
        }
    }
}
