<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use Illuminate\Http\Request;
use App\Http_Requests_RoomRequest;
use App\room;

class RoomsController extends Controller{
    
    public function index(){
        return view('room.add');
    }

    public function add(RoomRequest $request){
        return view('room.add');
    }
}
