@extends('layouts.common')
@section('title', '詳細')
@section('content')
    <div class="row bg-secondary-subtle bg-gradient border-bottom border-top border-secondary p-3">
            @foreach ($restaurants as $data)
                <div class="col-md-auto d-flex align-items-center">
                    <img src="{{ $data['photo']['pc']['l'] }}" class="img-fluid mx-auto">
                </div>
                <div class="col">
                    <dl class="row">
                        <div class="bg-light rounded border border-2 mb-1 mt-1">
                            <dt>{{ $data['name'] }}</dt>
                            <dd><a href="{{ $data['urls']['pc'] }}">店舗ページ(別サイトに飛びます)</a></dd>
                        </div>
                        <div class="bg-light rounded border border-2 mb-1 mt-1">
                            <dt>住所</dt>
                            <dd>{{ $data['address'] }}</dd>
                        </div>
                        <div class="bg-light rounded border border-2 mb-1 mt-1">
                            <dt>営業時間</dt>
                            <dd>{{ $data['open'] }}</dd>
                        </div>
                        <div class="bg-light rounded border border-2 mb-1 mt-1">
                            <dt>定休日</dt>
                            <dd>{{ $data['close'] }}</dd>
                        </div>
                        @if (isset($data['budget']['average']) and !empty($data['budget']['average']))
                            <div class="bg-light rounded border border-2 mb-1 mt-1">
                                <dt>平均料金</dt>
                                <dd>{{ $data['budget']['average'] }}</dd>
                            </div>
                        @endif
                        @if (isset($data['budget_memo']) and !empty($data['budget_memo']))
                            <div class="bg-light rounded border border-2 mb-1 mt-1">
                                <dt>料金備考</dt>
                                <dd>{{ $data['budget_memo'] }}</dd>
                            </div>
                        @endif
                    </dl>
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
