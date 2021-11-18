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
        


        {{-- 入力フォーム --}}
        <form action="/room/confirm" method="POST">
            @csrf

            <h2>【宿泊日を入力して下さい】</h2>

            <table>
                <tr>
                    <th>予約者名</th><td>{{Session::get('user_name')}}様</td>
                </tr>
                <tr>
                    <th>ご宿泊人数</th><td>{{Session::get('rest_num')}}名様</td>
                </tr>


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
                
        </table>

            <input type="submit" value="確認して予約" name="send">
    </form>
    @endsection



    @section('footer')
        copyright 2021 HouseHotel.
    @endsection