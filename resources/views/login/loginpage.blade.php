@extends('layouts.hotel_layout')

@section('title', 'ログイン')
    @section('menubar')
        @parent
        【利用者ログイン】

    @endsection

    @section('content')

    
    @if (count($errors) > 0)
        <p>入力内容に問題があります。確認して下さい。</p>
    @endif
    @if (isset($login_error))
        <p class="login_error">ログインに失敗しました</p>
    @endif

    
    {{-- 登録フォーム内容 --}}
    <form action="/login" method="post">
        <table>
            @csrf

            @foreach($errors -> get('mail') as $message)
                <tr>
                    <th class="error_message">ERROR</th>
                    <td class="error_message">{{$message}}</td>
                </tr>
            @endforeach
            <tr>
                <th>メールアドレス</th>
                <td><input type="text" name="mail" value="{{old('mail')}}"></td>
            </tr>

            @foreach($errors -> get('tel') as $message)
                <tr>
                    <th class="error_message">ERROR</th>
                    <td class="error_message">{{$message}}</td>
                </tr>
            @endforeach
            <tr>
                <th>電話番号(※ハイフン無し)</th>
                <td><input type="text" name="tel" value="{{old('tel')}}"></td>
            </tr>

            <tr>
                <th></th>
                <td><input type="submit" name="send" value="ログイン"></td>
            </tr>
        </table>
    </form>

    @endsection

    @section('content2')
    <a href="/"><br>ホーム画面へ</a>
    @endsection



    @section('footer')
        copyright 2021 HouseHotel.
    @endsection