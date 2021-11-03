@extends('layouts.hotel_layout')

@section('title', 'ログイン成功')
    @section('menubar')
        @parent
        【ログイン成功】

    @endsection

    @section('content')
    {{-- ログイン成功 --}}
            <h2>ようこそ {{$data->name}} 様</h2>

    @endsection
    

    @section('content2')

    <form action="/reserve/add" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <input type="submit" value="宿泊予約へ">
    </form>

    @endsection


    @section('footer')
        copyright 2021 HouseHotel.
    @endsection