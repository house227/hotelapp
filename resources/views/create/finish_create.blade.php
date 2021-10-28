@extends('layouts.hotel_layout')

@section('title', '登録成功')
    @section('menubar')
        @parent
        【登録成功】

    @endsection

    @section('content')
    {{-- 登録成功 --}}
    @parent
    ご登録ありがとうございました！
    
    <a href="/login"><br>ログイン画面へ</a>
    @endsection



    @section('footer')
        copyright 2021 HouseHotel.
    @endsection