@extends('layouts.common')
@section('title', '入力')
@section('content')
    <div class="row">
        <form method="GET" action="{{ route('result') }}">
            <div class="form-group">
                <dl class="row">
                    <dt class="col">
                        <button type="button" id="geolocation_button" class="btn btn-light btn-outline-dark">現在地取得</button>
                        <p class="m-0"><a href="#" id="google_map_link">取得位置確認用リンク(google mapが開きます)</a></p>
                    </dt>
                    <dd>
                    <input type="text" name="current_location" id="geolocation_status" class="form-control" disabled>
                    </dd>
                    <dt>現在地緯度</dt>
                    <dd>
                    <input type="text" name="latitude" id="latitude" class="form-control" value="{{ old('latitude') }}" required>
                    </dd>
                    <dt>現在地経度</dt>
                    <dd>
                    <input type="text" name="longitude" id="longitude" class="form-control" value="{{ old('longitude') }}" required>
                    </dd>
                    <dt>検索半径</dt>
                    <dd>
                    <select name="search_radius" class="form-select">
                        <option value="1">~300[m]</option>
                        <option value="2">~500[m]</option>
                        <option value="3" selected>~1000[m]</option>
                        <option value="4">~2000[m]</option>
                        <option value="5">~3000[m]</option>
                    </select>
                    </dd>
                </dl>
                <br>
                <input type="submit" value="検索" class="btn btn-light btn-outline-dark">
                <input type="hidden" name="page" value="1">
            </div>
        </form>
    </div>

<script src="{{ Vite::asset('resources/js/geolocation.js') }}"></script>

@endsection
