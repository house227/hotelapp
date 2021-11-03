@extends('layouts.hotel_layout')

@section('title', '部屋予約画面')
    @section('menubar')
        @parent
        【宿泊部屋予約画面】

    @endsection
    
    {{-- 予約画面 --}}
    @section('content')
    @parent
    <h2>ID.{{$data->id}} : {{$data->name}} 様</h2>
    @parent
    <h2>ご希望の情報をご入力ください。</h2>

    <form action="/reserve/confirm" method="POST">
        <input type="hidden"  name="user_id" value="{{$data->id}}">
        <table>
            <tr>
                <th>部屋種</th>
                <td>
                    洋室<input type="radio" name="serch_room" id="radio1" value="洋室">
                    : 
                    和室<input type="radio" name="serch_room" id="radio2" value="和室">
                    :
                    どちらでも<input type="radio" name="serch_room" id="radio2" value="両方">
                </td>
            </tr>

            <tr>
                <th>宿泊人数</th>
                <td>
                    <input type="text" name="people" value="{{old('people')}}">
                </td>
            </tr>
    
            <tr>
                <th>チェックイン日付</th>
                <td>
                    <input type="date" name="checkin" value="{{old('checkin')}}">
                </td>
            </tr>
    
            <tr>
                <th>チェックアウト日付</th>
                <td>
                    <input type="date" name="checkout" value="{{old('checkout')}}">
                </td>
            </tr>
        </table>
        
    </form>


    @endsection

    @section('content2')
    <a href="/home"><br>ホーム画面へ</a>
    @endsection

    @section('footer')
        copyright 2021 HouseHotel.
    @endsection