@extends('layouts.hotel_layout')

@section('title', '予約状況一覧')
    @section('menubar')
        @parent
        【予約状況一覧】

    @endsection

    @section('content')
    {{-- 予約状況確認ページ --}}
        <h2>ようこそ {{$data->name}} 様</h2>

        @parent
        <h3>【 {{$data->name}} 様 の予約状況 】</h3>



        <table>
            <tr><th>IDとお名前</th><th>予約内容</th></tr>
            <tr>
                <td>ID.{{$data->id}}: {{$data->name}}</td>
                @foreach ($reserved_data as $item)
                    <td>{{$item->getdata()}}</td>
                @endforeach
            </tr>

        </table>



    @endsection
    

    @section('content2')
    

    @endsection


    @section('footer')
        copyright 2021 HouseHotel.
    @endsection