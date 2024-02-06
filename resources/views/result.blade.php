@extends('layouts.common')
@section('title', '結果')
@section('content')
    <div class="row">
        <div class="row mt-1 border-bottom border-secondary">
            {{ $paginatedRestaurantDatas->links() }}
        </div>
        @foreach ($paginatedRestaurantDatas as $data)
            <div class="row bg-secondary-subtle bg-gradient border-bottom border-secondary p-3">
                <div class="col-md-3">
                    <img src="{{ $data['photo']['pc']['l'] }}" class="img-fluid">
                </div>
                <div class="col">
                    <div class="row">
                    <form method="POST" action="{{ route('detail',['id' => $data['id']]) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="latitude" value="{{ $inputLatitude }}">
                        <input type="hidden" name="longitude" value="{{ $inputLongitude }}">
                        <input type="hidden" name="search_radius" value="{{ $inputSearchRadius }}">
                        <input type="hidden" name="page" value="{{ $paginatedRestaurantDatas->currentPage() }}">
                        <input type="submit" class="btn btn-link text-decoration-none fw-medium" value="{{ $data['name'] }}">
                        {{-- <a href={{ route('detail', ['id' => $data['id'],'latitude' => $inputLatitude,'longitude' => $inputLongitude,'searchRadius' => $inputSearchRadius]) }}>{{ $data['name'] }}</a> --}}
                    </form>
                    </div>
                    <div class="row">
                        <p>{{ $data['access'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-3">
        {{ $paginatedRestaurantDatas->links() }}
    </div>
    <div class="row">
        <div class="row">
            <div class="d-inline-flex m-0">
                <a href="{{ route('search') }}" class="btn btn-light btn-outline-dark text-decoration-none">戻る</a>
            </div>
        </div>
    </div>
@endsection
