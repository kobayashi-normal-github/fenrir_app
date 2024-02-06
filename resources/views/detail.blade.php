@extends('layouts.common')
@section('title', '詳細')
@section('content')
    <div class="row bg-secondary-subtle bg-gradient border-bottom border-top border-secondary p-3">
            @foreach ($restaurants as $data)
                <div class="col-md-auto">
                    <img src="{{ $data['photo']['pc']['l'] }}" class="img-fluid">
                </div>
                <div class="col">
                <p>{{ $data['name'] }}<br>{{ $data['name_kana'] }}</p>
                <p>住所<br>{{ $data['address'] }}</p>
                <p>営業時間<br>{{ $data['open'] }}</p>
                <p>定休日<br>{{ $data['close'] }}</p>
                </div>
            @endforeach
    </div>
    <div class="row mt-3">
        <form method="GET" action="{{ route('result') }}">
            <div class="form-group">
                <input type="hidden" name="latitude" class="form-control" value="{{ $inputLatitude }}">
                <input type="hidden" name="longitude" class="form-control" value="{{ $inputLongitude }}">
                <input type="hidden" name="search_radius" class="form-control" value="{{ $inputSearchRadius }}">
                <input type="hidden" name="page" value="{{ $inputPage }}">
                <input type="submit" value="戻る" class="btn btn-light btn-outline-dark">
            </div>
        </form>
    </div>
@endsection
