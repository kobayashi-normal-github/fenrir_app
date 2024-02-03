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
    <div class="row">
        <form method="GET" action="{{ route('result') }}">
            <div class="form-group">
                <input type="hidden" name="latitude" class="form-control" value="{{ $inputLatitude }}">
                <input type="hidden" name="longitude" class="form-control" value="{{ $inputLongitude }}">
                <input type="hidden" name="search_radius" class="form-control" value="{{ $inputSearchRadius }}">
                <input type="hidden" name="page" value="{{ $inputPage }}">
                <input type="submit" value="戻る" class="btn btn-default">
            </div>
        </form>
    </div>
@endsection
