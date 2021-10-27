@extends('layouts.hotel_layout')

@section('title', 'ホーム')
    @section('menubar')
        @parent
        インデックスページ
    @endsection

    @section('content')

    <p>{{$msg}}</p>
    @if (count($errors) > 0)
        <p>入力内容に問題があります。確認して下さい。</p>
    @endif

    <form action="/hotel" method="post">
        <table>
            @csrf

            @foreach($errors -> get('name') as $message)
                <tr>
                    <th class="error_message">ERROR</th>
                    <td class="error_message">{{$message}}</td>
                </tr>
            @endforeach
            <tr class="form_margin">
                <th>氏名：</th>
                <td><input type="text" name="name" value="{{old('name')}}"></td>
            </tr>

            @foreach($errors -> get('mail') as $message)
                <tr>
                    <th class="error_message">ERROR</th>
                    <td class="error_message">{{$message}}</td>
                </tr>
            @endforeach
            <tr>
                <th>メールアドレス：</th>
                <td><input type="text" name="mail" value="{{old('mail')}}"></td>
            </tr>

            @foreach($errors -> get('tel') as $message)
                <tr>
                    <th class="error_message">ERROR</th>
                    <td class="error_message">{{$message}}</td>
                </tr>
            @endforeach
            <tr><th>電話番号(※ハイフン無し)：</th><td><input type="text" name="tel" value="{{old('tel')}}"></td></tr>
            <tr><th></th><td><input type="submit" name="send"></td></tr>
        </table>
    </form>

    @endsection



    @section('footer')
        copyright 2021 HouseHotel.
    @endsection