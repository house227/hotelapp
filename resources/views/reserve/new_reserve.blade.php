@extends('layouts.hotel_layout')

@section('title', '部屋予約画面')
    @section('menubar')
        @parent
        【宿泊部屋予約画面】

    @endsection
    
    {{-- 予約画面 --}}
    @section('content')
    @parent
    <h2>ご希望の情報をご入力ください。</h2>

    <form action="/reserve" method="POST">
        <table>
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