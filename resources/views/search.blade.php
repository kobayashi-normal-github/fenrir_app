@extends('layouts.common')
@section('title', '入力')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <form method="POST" action="{{ route('result') }}">
                <div class="form-group">
                    {{ csrf_field() }}
                    <button type="button" id="geolocation_button">現在地</button><p></p>
                    <input type="text" name="current_location" id="geolocation_status" class="form-control">
                    <p class="ext-monospace">半径</p>
                    <input type="text" name="search_radius" class="form-control">
                    <br><input type="submit" value="検索" class="btn btn-default">
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
