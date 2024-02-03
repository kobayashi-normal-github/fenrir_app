@extends('layouts.common')
@section('title', '入力')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <form method="GET" action="{{ route('result') }}">
                <div class="form-group">
                    {{-- {{ csrf_field() }} --}}
                    <button type="button" id="geolocation_button">現在地</button><p></p>
                    {{-- <input type="text" name="current_location" id="geolocation_status" class="form-control" required> --}}
                    <input type="text" name="current_location" id="geolocation_status" class="form-control" disabled>
                    <p>緯度</p>
                    <input type="text" name="latitude" id="latitude" class="form-control">
                    <p>経度</p>
                    <input type="text" name="longitude" id="longitude" class="form-control">
                    <p class="ext-monospace">半径</p>
                    <input type="text" name="search_radius" class="form-control">
                    <br>
                    <input type="submit" value="検索" class="btn btn-default">
                    <input type="hidden" name="page" value="1">
                </div>
            </form>

        </div>
    </div>
    <div class="mx-auto" style="width: 450px;">
        <div class="row">
            <div class="col-sm-12">
                <p>{{ $msg }}</p>
            </div>
        </div>
    </div>

<script src="{{ Vite::asset('resources/js/geolocation.js') }}"></script>

@endsection
