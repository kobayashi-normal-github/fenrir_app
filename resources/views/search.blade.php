@extends('layouts.common')
@section('title', '入力')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <form method="GET" action="{{ route('result') }}">
                <div class="form-group">
                    {{-- {{ csrf_field() }} --}}
                    <button type="button" id="geolocation_button" class="btn btn-light btn-outline-dark">現在地</button><p></p>
                    {{-- <input type="text" name="current_location" id="geolocation_status" class="form-control" required> --}}
                    <input type="text" name="current_location" id="geolocation_status" class="form-control" disabled>
                    <p>緯度</p>
                    <input type="text" name="latitude" id="latitude" class="form-control" value="{{ old('latitude') }}" required>
                    <p>経度</p>
                    <input type="text" name="longitude" id="longitude" class="form-control" value="{{ old('longitude') }}" required>
                    <p class="ext-monospace">半径</p>
                    {{-- <input type="text" name="search_radius" class="form-control"> --}}
                    <select name="search_radius" class="form-select">
                        <option value="1">~300[m]</option>
                        <option value="2">~500[m]</option>
                        <option value="3">~1000[m]</option>
                        <option value="4">~2000[m]</option>
                        <option value="5">~3000[m]</option>
                    </select>
                    <br>
                    <input type="submit" value="検索" class="btn btn-light btn-outline-dark">
                    <input type="hidden" name="page" value="1">
                </div>
            </form>

        </div>
    </div>

<script src="{{ Vite::asset('resources/js/geolocation.js') }}"></script>

@endsection
