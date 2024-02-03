@extends('layouts.common')
@section('title', '結果')
@section('content')
    <div class="row">
        @foreach ($paginatedRestaurantDatas as $data)
            <div class="row bg-secondary-subtle p-3 mt-1">
                <div class="row">
                    <form method="POST" action="{{ route('detail',['id' => $data['id']]) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="latitude" value="{{ $inputLatitude }}">
                        <input type="hidden" name="longitude" value="{{ $inputLongitude }}">
                        <input type="hidden" name="search_radius" value="{{ $inputSearchRadius }}">
                        <input type="hidden" name="page" value="{{ $paginatedRestaurantDatas->currentPage() }}">
                        <input type="submit" value="{{ $data['name'] }}">
                        {{-- <a href={{ route('detail', ['id' => $data['id'],'latitude' => $inputLatitude,'longitude' => $inputLongitude,'searchRadius' => $inputSearchRadius]) }}>{{ $data['name'] }}</a> --}}
                    </form>
                </div>
                <div class="col">
                    <img src="{{ $data['photo']['pc']['l'] }}"/>
                </div>
                <div class="col">
                    <p>{{ $data['access'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-1">
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
