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
            <tr>
                <th>IDと氏名</th>

                {{-- 予約データ分だけテーブルのタイトル「予約内容」を表示「「 --}}
                @for ($i = 1; $i < count($reserved_data)+1; $i++)
                <th>予約内容{{$i}}</th>
                @endfor


            </tr>
            <tr>
                <td>ID.{{$data->id}}: {{$data->name}} 様</td>

                {{-- 外側ループ：IDに該当する予約データ配列から取り出す --}}
                @foreach ($reserved_data as $item)

                <td>
                    <table>

                        @foreach ($item->getdata() as $data)
                            <tr><td>{{$data}}</td></tr>
                        @endforeach
                        
                    </table>
                </td>
                    
                @endforeach
            </tr>
        </table>



    @endsection
    

    @section('content2')
    
    <a href="/"><br>ホーム画面へ</a>

    @endsection


    @section('footer')
        copyright 2021 HouseHotel.
    @endsection