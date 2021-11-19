@extends('layouts.hotel_layout')

@section('title', '予約画面')
    @section('menubar')
        @parent
        【新規予約画面】

    @endsection
    
    {{-- 確認画面 --}}
    @section('content')
    @parent



    {{-- 空き部屋データを表示して予約の確認 --}}

        </table>
        

        @if (count($errors) > 0)
            <p>入力内容に問題があります。確認して下さい。</p>
        @endif
        @if (isset($login_error))
            <p class="login_error">ログインに失敗しました</p>
        @endif


        {{-- 入力フォーム --}}
        <form action="/reserve/create" method="POST">
            @csrf

            <h2>【予約内容をご確認ください】</h2>

            <table>
                <tr>
                    <th>予約者名</th><td>{{Session::get('user_name')}}様</td>
                </tr>

                <tr>
                    <th>ご宿泊人数</th><td>{{Session::get('rest_num')}}名様</td>
                </tr>

                <tr>
                    <th>部屋名</th><td>{{Session::get('room_name')}}</td>
                </tr>

                <tr>
                    <th>部屋番号</th><td>{{Session::get('room_num')}}号室</td>
                </tr>

                <tr>
                    <th>チェックイン日</th><td>{{Session::get('check_in')}}</td>
                </tr>
                
                <tr>
                    <th>チェックアウト日</th><td>{{Session::get('check_out')}}</td>
                </tr>

                
        </table>

            <input type="submit" value="確認して予約" name="send">
    </form>

    <a href="/room/search"><br>空き部屋検索へ戻る</a>
    @endsection



    @section('footer')
        copyright 2021 HouseHotel.
    @endsection