@extends('layouts.hotel_layout')

@section('title', '管理者でログイン')
    @section('menubar')
        @parent
        【管理者】

    @endsection

    @section('content')
    {{-- ログイン成功 --}}
            <h2>こんにちは管理人</h2>

    @endsection
    

    @section('content2')
    

    <form action="" method="POST">
        @csrf
        {{-- <input type="hidden" name="id" value="{{$data->id}}"> --}}
        <input type="submit" value="ホテル全体の予約状況確認へ">
    </form>

    {{-- <form action="" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <input type="submit" value="宿泊予約へ">
    </form> --}}
    <a href="/room/search"><br>空き部屋検索へ</a>
    <a href="/"><br>ホーム画面へ</a>

    @endsection


    @section('footer')
        copyright 2021 HouseHotel.
    @endsection