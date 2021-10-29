@extends('layouts.hotel_layout')

@section('title', '部屋作成')
    @section('menubar')
        @parent
        【部屋作成画面】

    @endsection

    @section('content')


    @if (count($errors) > 0)
        <p>入力内容に問題があります。確認して下さい。</p>
    @endif

    
    {{-- 登録フォーム内容 --}}
    <form action="/roomadd" method="post">
        <table>
            @csrf
            @parent
            <h3>※部屋種ID："1"が「洋室」で"2"が「和室」</h3>

            @foreach($errors -> get('roomgroup_id') as $message)
                <tr>
                    <th class="error_message">ERROR</th>
                    <td class="error_message">{{$message}}</td>
                </tr>
            @endforeach
                <th>部屋種ID</th>
                <td>
                    1<input type="radio" name="roomgroup_id" id="radio1" value="1">
                    : 
                    2<input type="radio" name="roomgroup_id" id="radio2" value="2">
                </td>
            </tr>

            @foreach($errors -> get('room_num') as $message)
                <tr>
                    <th class="error_message">ERROR</th>
                    <td class="error_message">{{$message}}</td>
                </tr>
            @endforeach
            <tr>
                <th>部屋番号</th>
                <td><input type="text" name="room_num" value="{{old('room_num')}}"></td>
            </tr>

            
            <tr><th></th><td><input type="submit" name="send"></td></tr>
        </table>
    </form>

    @endsection

    @section('content2')
    <a href="/"><br>ホーム画面へ</a>
    @endsection



    @section('footer')
        copyright 2021 HouseHotel.
    @endsection