@extends('layouts.hotel_layout')

@section('title', '管理人用予約状況')
    @section('menubar')
        @parent
        【管理人用全予約一覧】

    @endsection

    @section('content')
    {{-- 管理人用予約確認ページ --}}
        <h2>こんにちは管理人</h2>

        @parent
        <h3>【 現在の全予約状況 】</h3>

           

    @endsection
    

    @section('content2')
    
    <a href="/room/search"><br>空き部屋検索へ</a>
    <a href="/"><br>ホーム画面へ</a>

    @endsection


    @section('footer')
        copyright 2021 HouseHotel.
    @endsection