@extends('layouts.hotel_layout')

@section('title', '部屋検索結果')
    @section('menubar')
        @parent
        【部屋検索結果】

    @endsection

    @section('content')
    
    {{-- 検索結果 --}}

        <table>
           @foreach ($datas as $data)
               <tr>
                    <th>部屋番号 </th><th>部屋名</th>
               </tr>
               <tr>
                    <td>{{$data->room_num}}</td><td></td>
               </tr>
           @endforeach
        </table>


    @endsection

    @section('content2')
    <a href="/room/search"><br>部屋検索へ</a>
    <a href="/"><br>ホーム画面へ</a>
    @endsection



    @section('footer')
        copyright 2021 HouseHotel.
    @endsection