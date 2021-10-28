@extends('layouts.hotel_layout')

@section('title', 'ログイン成功')
    @section('menubar')
        @parent
        【ログイン成功】

    @endsection

    @section('content')
    {{-- ログイン成功 --}}
    
    <table>
        <tr>
            <th>氏名</th>
            <td>{{$data->name}}</td>
        </tr>

        <tr>
            <th>メールアドレス</th>
            <td>{{$data->mail}}</td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td>{{$data->tel}}</td>
        </tr>
    </table>

    @endsection

    @section('content2')
        <a href="/reserve">宿泊予約へ...</a>
    @endsection


    @section('footer')
        copyright 2021 HouseHotel.
    @endsection