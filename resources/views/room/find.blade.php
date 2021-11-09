@extends('layouts.hotel_layout')

@section('title', '部屋検索結果')
    @section('menubar')
        @parent
        【部屋検索結果】

    @endsection

    @section('content')
    
    {{-- 検索結果 --}}

        <table>
           
               <tr>
                    <th>部屋番号 </th><th>部屋名</th>
               </tr>

               {{-- 空き部屋情報は連想配列で返ってるのでforeachを使う--}}
               @foreach ($room_num as $data)
               <tr>
                    <td>{{$data->room_num}}</td>

                {{-- 同じくforeachで表示 --}}
                    @foreach ($room_name as $item)

                    {{-- roomテーブルの外部キーとroomgroupテーブルの主キーが同じなら表示 --}}
                    @if ($data->roomgroup_id === $item->id)
                        <td>{{$item->room_name}}</td>
                    @endif

                    @endforeach
                    

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