@extends('layouts.hotel_layout')

@section('title', '予約完了')
    @section('menubar')
        @parent
        【予約完了】

    @endsection

    @section('content')
    {{-- ログイン成功 --}}
        <h2>{{Session::get('user_name')}}様、ご予約ありがとうございます！</h2>

        <table>
            <tr>
                <th>ご予約者名</th><td>{{Session::get('user_name')}} 様</td>
            </tr>
            <tr>
                <th>メールアドレス</th><td>{{Session::get('user_mail')}}</td>
            </tr>
            <tr>
                <th>部屋番号/部屋名</th><td>{{Session::get('room_num')}}号室 / {{Session::get('room_name')}}</td>
            </tr>
            <tr>
                <th>チェックイン日</th><td>{{Session::get('check_in')}}</td>
            </tr>
            <tr>
                <th>チェックアウト日</th><td>{{Session::get('check_out')}}</td>
            </tr>
        </table>

    @endsection
    

    @section('content2')
    


    <a href="/reserve">予約状況確認へ</a>

    {{-- <form action="" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <input type="submit" value="宿泊予約へ">
    </form> --}}
    <a href="/reserve/search"><br>空き部屋検索へ</a>

    <a href="/"><br>ホーム画面へ</a>
    @endsection


    @section('footer')
        copyright 2021 HouseHotel.
    @endsection