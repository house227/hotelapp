@extends('layouts.hotel_layout')

@section('title', '管理人用予約状況')
    @section('menubar')
        @parent
        【管理人用全予約一覧】

    @endsection

    @section('content')
    {{-- 管理人用予約確認ページ --}}
        <h2>こんにちは管理人</h2>

        @parent
        <h3>【 現在の全予約状況 】</h3>

        {{-- テスト
        <table>
            @foreach ($items as $item)
            <tr>
                <th>{{$item->Hoteluser->name}}</th>

                        @foreach ($item->rooms as $data)
                    <tr>
                        <td>部屋番号:</td><td>{{$data->room_num}}</td>
                    </tr>
                @endforeach

                
            </tr>
            @endforeach
        </table> --}}
        @foreach ($items as $data)
            <table>
                <tr><th>{{$data->Hoteluser->name}}</th></tr>
                {{-- $itemsにはReserveControllerから来たEagerローディングで得たデータがある --}}
                
                <tr>
                    {{-- 得たデータからreserveDBから人数を引き出した --}}
                    <td>{{$data->person_num}}</td>
                </tr>
                <tr>
                    {{-- 得たデータから中間テーブルにアクセスし、部屋番号を取得した --}}
                    <td>{{$data->rooms->first()->room_num}}</td>
                </tr>

                
            </table>
        @endforeach
             
           

    @endsection
    

    @section('content2')
    
    <a href="/room/search"><br>空き部屋検索へ</a>
    <a href="/"><br>ホーム画面へ</a>

    @endsection


    @section('footer')
        copyright 2021 HouseHotel.
    @endsection