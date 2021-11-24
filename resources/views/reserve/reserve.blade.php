@extends('layouts.hotel_layout')

@section('title', '予約状況')
    @section('menubar')
        @parent
        【予約状況一覧】

    @endsection

    @section('content')
    {{-- 予約状況確認ページ --}}
        <h2>ようこそ {{Session::get('user_name')}} 様</h2>

        @parent
        <h3>【 {{Session::get('user_name')}} 様 の予約状況 】</h3>

            @if (count($reserved_data) > 0)
                

            <table>
                <tr>
                    <th>IDと氏名</th>

                    {{-- 予約データ分だけテーブルのタイトル「予約内容」を表示「「 --}}
                    @for ($i = 1; $i < count($reserved_data)+1; $i++)
                    <th>予約内容{{$i}}</th>
                    @endfor


                </tr>
                <tr>
                    <td>ID.{{Session::get('user_id')}}: {{Session::get('user_name')}} 様</td>

                    {{-- 外側ループ：IDに該当する予約データ配列から取り出す --}}
                    @foreach ($reserved_data as $item)

                    <td>
                        <table>

                            @foreach ($item->getdata() as $data)

                                @switch($loop->iteration)
                                    @case(1)
                                        <th>部屋番号</th>
                                        @break
                                    @case(2)
                                        <th>ご宿泊人数</th>
                                        @break
                                    @case(3)
                                        <th>チェックイン</th>
                                        @break
                                    @case(4)
                                        <th>チェックアウト</th>
                                        @break
                                    @default
                                        <th>料金</th>
                                        
                                @endswitch

                                {{-- reserveモデルからのdataを順次表示 --}}
                                <tr><td>{{$data}}</td></tr>
                            @endforeach
                            
                        </table>
                    </td>
                        
                    @endforeach
                </tr>
             </table>

             @else
                <h2>予約情報なし</h2>
            @endif

    @endsection
    

    @section('content2')
    
    <a href="/room/search"><br>空き部屋検索へ</a>
    <a href="/"><br>ホーム画面へ</a>

    @endsection


    @section('footer')
        copyright 2021 HouseHotel.
    @endsection