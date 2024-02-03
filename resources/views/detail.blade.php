@extends('layouts.common')
@section('title', '詳細')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            @foreach ($restaurants as $data)
                <p>{{ $data['name'] }}</p>
                <p>{{ $data['name_kana'] }}</p>
                <p>{{ $data['address'] }}</p>
                <p>{{ $data['open'] }}</p>
                <p>{{ $data['close'] }}</p>
                <img src="{{ $data['photo']['pc']['l'] }}"/>
            @endforeach
        </div>
    </div>
    <div class="mx-auto" style="width: 450px;">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('result') }}">戻る</a>
            </div>
        </div>
    </div>
@endsection
