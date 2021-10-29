@extends('layouts.hotel_layout')

@section('title', '確認画面')
    @section('menubar')
        @parent
        【新規登録情報確認画面】

    @endsection
    
    {{-- 確認画面 --}}
    @section('content')
    @parent
    登録内容をご確認ください
        <table>
            <tr>
                <th>氏名</th><td>{{$name}}</td>
            </tr>
            <tr>
                <th>メールアドレス</th><td>{{$mail}}</td>
            </tr>
            <tr>
                <th>電話番号</th><td>{{$tel}}</td>
            </tr>
        </table>

        <form action="/create/create_db" method="POST">
            @csrf
            <input type="hidden" name="name" value="{{$name}}">
            <input type="hidden" name="mail" value="{{$mail}}">
            <input type="hidden" name="tel" value="{{$tel}}">
            <input type="submit" value="確認したので送信する">
        </form>
    @endsection



    @section('footer')
        copyright 2021 HouseHotel.
    @endsection