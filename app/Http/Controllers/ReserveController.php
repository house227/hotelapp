<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\reserve;


class ReserveController extends Controller{



    // 新規予約画面
    public function add_index(){
        return view('reserve.new_reserve');
    }

    public function show_post(Request $request){

        $reserves = hoteluser::find($request->id)->reserves;
        $user_data = DB::table('hotelusers')->where('id', $request->id)->first();

        return view('reserve.reserve', ['data' => $user_data , 'reserved_data' => $reserves]);
    }

    public function confirm(Request $request){
        return view('reserve.confirm_reserve', ['data' => $request]);
    }
}
