@extends('layouts.hotel_layout')

@section('title', '部屋検索')
    @section('menubar')
        @parent
        【空き部屋を検索】

    @endsection

    @section('content')
    
    {{-- 登録フォーム内容 --}}
    <form action="/room/search" method="post">
        <table>
            @csrf

            <tr>
                <th>部屋種</th>
                <td>洋室<input type="radio" name="room_group" id="radio1" value="洋室" checked="checked"></td> 
                <td>和室<input type="radio" name="room_group" id="radio2" value="和室"></td>
            </tr>

            
            <tr>
                <th>宿泊人数</th>
                <td><select name="rest_num" id="select_num">
                    <option value="1" selected="selected">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    </select>
                    人
                </td>
            </tr>

            <tr>
                <th></th>
                <td><input type="submit" name="send" value="検索"></td>
            </tr>
        </table>
    </form>

    @endsection

    @section('content2')
    <a href="/"><br>ホーム画面へ</a>
    @endsection



    @section('footer')
        copyright 2021 HouseHotel.
    @endsection