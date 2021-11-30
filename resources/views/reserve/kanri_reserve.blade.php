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

            <table>
                <th>予約ID</th><th>氏名</th><th>人数</th><th>部屋番号</th>
                <th>チェックイン</th><th>チェックアウト</th><th>料金</th>
                @foreach ($reserved as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->Hoteluser->name}}</td>
                        {{-- 得たデータからreserveDBから人数を引き出した --}}
                        <td>{{$data->person_num}}人</td>
                        {{-- 得たデータから中間テーブルにアクセスし、部屋番号を取得した --}}
                        <td>{{$data->rooms->first()->room_num}}号室</td>
                        <td>{{$data->check_in}}</td>
                        <td>{{$data->check_out}}</td>
                        <td>${{$data->rooms->first()->pivot->price}}</td>
                    </tr>
                    {{-- $itemsにはReserveControllerから来たEagerローディングで得たデータがある --}}


                @endforeach
            </table>

             
           

    @endsection
    

    @section('content2')
    
    <a href="/room/search"><br>空き部屋検索へ</a>
    <a href="/"><br>ホーム画面へ</a>

    @endsection


    @section('footer')
        copyright 2021 HouseHotel.
    @endsection