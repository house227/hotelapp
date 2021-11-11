@extends('layouts.hotel_layout')

@section('title', '予約完了')
    @section('menubar')
        @parent
        【予約完了】

    @endsection

    @section('content')
    {{-- ログイン成功 --}}
        <h2>{{$user_name}}様、ご予約ありがとうございます！</h2>

        <table>
            <tr>
                <th>氏名</th><td>{{$user_name}} 様</td>
            </tr>
            <tr>
                <th>メールアドレス</th><td>{{$mail}}</td>
            </tr>
            <tr>
                <th>部屋番号/部屋名</th><td>{{$num}}号室 / {{$room_name}}</td>
            </tr>
            <tr>
                <th>チェックイン日</th><td>{{$check_in}}</td>
            </tr>
            <tr>
                <th>チェックアウト日</th><td>{{$check_out}}</td>
            </tr>
        </table>

    @endsection
    

    @section('content2')
    

    <form action="/reserve" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$id}}">
        <input type="submit" value="予約状況確認へ">
    </form>

    {{-- <form action="" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <input type="submit" value="宿泊予約へ">
    </form> --}}
    <a href="/reserve/search"><br>空き部屋検索へ</a>

    @endsection


    @section('footer')
        copyright 2021 HouseHotel.
    @endsection