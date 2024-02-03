@extends('layouts.common')
@section('title', '結果')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            @foreach ($paginatedRestaurantDatas as $data)
                <a href={{ route('detail', ['id' => $data['id']]) }}>{{ $data['name'] }}</a>
                <p>{{ $data['access'] }}</p>
                <img src="{{ $data['photo']['pc']['l'] }}"/>
            @endforeach
        </div>
        {{ $paginatedRestaurantDatas->links() }}
    </div>
    <div class="mx-auto" style="width: 450px;">
        <div class="row">
            <div class="col-sm-12">
                {{-- <p>{{ $msg }}</p> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('search') }}">戻る</a>
            </div>
        </div>
    </div>
@endsection
