@extends('layouts.hotel_layout')

@section('title', '登録完了画面')
    @section('menubar')
        @parent
        【登録完了画面】

    @endsection
    
    {{-- 確認画面 --}}
    @section('content')
    @parent
    <h1>登録完了</h1>
    @endsection



    @section('footer')
        copyright 2021 HouseHotel.
    @endsection