<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelEditRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http_Requests_HotelEditRequest;

class HotelController extends Controller
{
    public function edit(Request $request){
        return view('hotel.edit', ['msg' => 'お客様情報入力']);
    }

    public function edit_post(HotelEditRequest $request){
        return view('hotel.edit', ['msg' => '成功']);
    }
}
