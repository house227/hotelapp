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
                    <th>部屋番号 </th><th>部屋名</th><th>宿泊可能人数</th><th>予約はこちら</th>
               </tr>

               {{-- 空き部屋情報は連想配列で返ってるのでforeachを使う--}}
               @foreach ($room_num as $data)
               <form action="/room/reserve" method="POST">
                @csrf

               <tr>
                    <td>{{$data->room_num}}号室</td>

                {{-- 同じくforeachで表示 --}}
                    @foreach ($room_name as $item)


                    {{-- roomテーブルの外部キーとroomgroupテーブルの主キーが同じなら表示 --}}
                    @if ($data->roomgroup_id === $item->id)
                        <td>{{$item->room_name}}</td>

                        {{-- if文で振り分けられた部屋名をvalueとして送る --}}
                        <input type="hidden" value="{{$item->room_name}}" name="name">
                        <td>{{$item->room_people}}人</td>
                        <input type="hidden" value="{{$item->room_people}}" name="people">
                    @endif

                    @endforeach
                    
                    
                       
                        <input type="hidden" value="{{$data->room_num}}" name="num">
                        
                        <td>
                            <input type="submit" name="send" value="予約する">
                        </td>
                    </form>
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