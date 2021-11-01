<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\reserve;


class ReserveController extends Controller
{
    public function index(){
        return view('reserve.new_reserve');
    }

    public function index_post(Request $request){

        $user_data = DB::table('hotelusers')->where('id', $request->id)->first();

        return view('reserve.new_reserve', ['data' => $user_data]);
    }
}
