@extends('layouts.hotel_layout')

@section('title', '予約確認画面')
    @section('menubar')
        @parent
        【新規予約確認画面】

    @endsection
    
    {{-- 確認画面 --}}
    @section('content')
    @parent
    予約内容をご確認ください
    {{-- 空き部屋データを表示して予約の確認 --}}
        <table>
            <tr>
                <th>部屋番号</th><td>{{$num}}号室</td>
            </tr>
            <tr>
                <th>宿泊可能人数</th><td>{{$people}}人まで</td>
            </tr>
            <tr>
                <th>部屋名</th><td>{{$name}}</td>
            </tr>
        </table>

        <form action="" method="POST">
            @csrf

            <input type="hidden" name="num" value="{{$num}}">
            <input type="hidden" name="name" value="{{$name}}">
            <input type="hidden" name="people" value="{{$people}}">
            <input type="submit" value="確認して予約">
        </form>
    @endsection



    @section('footer')
        copyright 2021 HouseHotel.
    @endsection