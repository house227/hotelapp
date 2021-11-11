@extends('layouts.hotel_layout')

@section('title', '予約確認画面')
    @section('menubar')
        @parent
        【新規予約確認画面】

    @endsection
    
    {{-- 確認画面 --}}
    @section('content')
    @parent
    <h2>予約内容をご確認ください</h2>



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
        
        <br>

        @if (count($errors) > 0)
            <p>入力内容に問題があります。確認して下さい。</p>
        @endif
        @if (isset($login_error))
            <p class="login_error">ログインに失敗しました</p>
        @endif


        {{-- 入力フォーム --}}
        <form action="/reserve/create" method="POST">
            @csrf

            <h2>【必要事項を入力して下さい】</h2>
            <h4>※確認の為お名前(フルネーム)と<br>メールアドレスをご入力下さい※</h4>

            <table>
                @foreach($errors -> get('check_in') as $message)
                    <tr>
                        <th class="error_message">ERROR</th>
                        <td class="error_message">{{$message}}</td>
                    </tr>
                @endforeach

                <tr>
                    <th>チェックイン</th>
                    <td><input type="date" name="check_in" value="{{old('check_in')}}"></td>
                </tr>


                @foreach($errors -> get('check_out') as $message)
                    <tr>
                        <th class="error_message">ERROR</th>
                        <td class="error_message">{{$message}}</td>
                    </tr>
                @endforeach

                <tr>
                    <th>チェックアウト</th>
                    <td><input type="date" name="check_out" value="{{old('check_out')}}"></td>
                </tr>
                

            @foreach($errors -> get('name') as $message)
                <tr>
                    <th class="error_message">ERROR</th>
                    <td class="error_message">{{$message}}</td>
                </tr>
            @endforeach

            <tr>
                <th>氏名</th>
                <td><input type="text" name="user_name" value="{{old('user_name')}}"></td>
            </tr>


            @foreach($errors -> get('mail') as $message)
                <tr>
                    <th class="error_message">ERROR</th>
                    <td class="error_message">{{$message}}</td>
                </tr>
            @endforeach

            <tr>
                <th>メールアドレス:</th>
                <td><input type="text" name="mail" value="{{old('mail')}}"></td>
            </tr>

        </table>



            <input type="hidden" name="num" value="{{$num}}">
            <input type="hidden" name="room_name" value="{{$name}}">
            <input type="hidden" name="person_num" value="{{$people}}">
            <input type="submit" value="確認して予約" name="send">
    </form>
    @endsection



    @section('footer')
        copyright 2021 HouseHotel.
    @endsection