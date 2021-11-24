@extends('layouts.hotel_layout')

@section('title', '部屋検索')
    @section('menubar')
        @parent
        【空き部屋を検索】

    @endsection

    @section('content')

    @if (count($errors) > 0)
        <p >※入力内容に問題があります。確認して下さい※</p>
    @endif
    
    {{-- 登録フォーム内容 --}}
    <form action="/room/search" method="post">
        <table>
            @csrf

            <tr>
                <th>部屋種</th>
                <td>
                    <select name="room_group" id="select_group">
                        <option value="和室" selected="selected">和室</option>
                        <option value="洋室">洋室</option>
                    </select>
                </td>
            </tr>

            
            <tr>
                <th>宿泊人数</th>
                <td>
                    <select name="rest_num" id="select_num">
                        <option value="1" selected="selected">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    人
                </td>
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

            <tr>
                <th></th>
                <td><input type="submit" name="send" value="検索"></td>
            </tr>
        </table>
    </form>

    @endsection

    @section('content2')
    <a href="/reserve">予約状況確認へ</a>
    <a href="/"><br>ホーム画面へ</a>
    @endsection



    @section('footer')
        copyright 2021 HouseHotel.
    @endsection