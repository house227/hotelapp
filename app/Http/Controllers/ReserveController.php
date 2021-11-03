<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\reserve;


class ReserveController extends Controller{

    // 予約確認
    public function index(){
        return view('reserve.show_reserve');
    }


    // 新規予約画面
    public function add_index(){
        return view('reserve.new_reserve');
    }

    public function add_index_post(Request $request){

        $user_data = DB::table('hotelusers')->where('id', $request->id)->first();

        return view('reserve.new_reserve', ['data' => $user_data]);
    }

    public function confirm(Request $request){
        return view('reserve.confirm_reserve', ['data' => $request]);
    }
}
