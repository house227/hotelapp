@extends('layouts.hotel_layout')

@section('title', '確認画面')
    @section('menubar')
        @parent
        【新規登録情報確認画面】

    @endsection
    
    {{-- 確認画面 --}}
    @section('content')
    @parent
    登録内容をご確認ください
        <table>
            
            <tr>
                <th>ID</th><td>{{$data->user_id}}</td>
            </tr>

            <tr>
                <th>部屋種</th><td>{{$data->serch_room}}</td>
            </tr>
            <tr>
                <th>宿泊人数</th><td>{{$data->people}}</td>
            </tr>
            <tr>
                <th>チェックイン日</th><td>{{$data->checkin}}</td>
            </tr>
            <tr>
                <th>チェックアウト日</th><td>{{$data->checkout}}</td>
            </tr>
        </table>

        <form action="/reserve/reserve_db" method="POST">
            @csrf
            <input type="hidden" name="hoteluser_id" value="{{$data->user_id}}">
            <input type="hidden" name="" value="{{$mail}}">
            <input type="hidden" name="tel" value="{{$tel}}">
            <input type="submit" value="確認したので送信する">
        </form>
    @endsection



    @section('footer')
        copyright 2021 HouseHotel.
    @endsection