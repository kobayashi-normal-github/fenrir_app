@extends('layouts.common')
@section('title', '結果')
@section('content')
    <div class="row">
        <div class="row">
            <div class="d-flex m-0 p-0">
                <a href="{{ route('search') }}" class="btn btn-light btn-outline-dark text-decoration-none">戻る</a>
            </div>
        </div>
        <div class="row mt-1 mx-auto border-secondary d-flex flex-wrap">
            {{ $paginatedRestaurantDatas->links() }}
        </div>
        @foreach ($paginatedRestaurantDatas as $data)
        <form method="POST" action="{{ route('detail',['id' => $data['id']]) }}">
            {{ csrf_field() }}
            <div class="row bg-secondary-subtle bg-gradient border-bottom border-top border-secondary p-3">
                <div class="col-md-3 d-flex align-items-center">
                    <input type="image" src="{{ $data['photo']['pc']['l'] }}" class="img-fluid mx-auto">
                </div>
                <div class="col">
                    <div class="row">
                        <input type="hidden" name="latitude" value="{{ $inputLatitude }}">
                        <input type="hidden" name="longitude" value="{{ $inputLongitude }}">
                        <input type="hidden" name="search_radius" value="{{ $inputSearchRadius }}">
                        <input type="hidden" name="page" value="{{ $paginatedRestaurantDatas->currentPage() }}">
                        <input type="submit" class="btn btn-link text-decoration-none fw-medium" value="{{ $data['name'] }}">
                        {{-- <a href={{ route('detail', ['id' => $data['id'],'latitude' => $inputLatitude,'longitude' => $inputLongitude,'searchRadius' => $inputSearchRadius]) }}>{{ $data['name'] }}</a> --}}
                    </div>
                    <dl class="row">
                        <div class="bg-light rounded border border-2 mb-1 mt-1">
                            <dt>営業時間</dt>
                            <dd>{{ $data['open'] }}</dd>
                        </div>
                        <div class="bg-light rounded border border-2 mb-1 mt-1">
                            <dt>アクセス</dt>
                            <dd>{{ $data['access'] }}</dd>
                        </div>
                        <div class="bg-light rounded border border-2 mb-1 mt-1">
                            <dt>住所</dt>
                            <dd>{{ $data['address'] }}</dd>
                        </div>
                    </dl>
                    <div>
                        <input type="submit" class="btn btn-light btn-outline-dark" value="詳細">
                    </div>
                </div>
            </div>
        </form>
        @endforeach
    </div>
    <div class="row mt-3">
        {{ $paginatedRestaurantDatas->links() }}
    </div>
    <div class="row">
        <div class="d-flex m-0 p-0">
            <a href="{{ route('search') }}" class="btn btn-light btn-outline-dark text-decoration-none">戻る</a>
        </div>
    </div>
@endsection
