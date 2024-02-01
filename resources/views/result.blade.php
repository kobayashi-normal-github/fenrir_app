@extends('layouts.common')
@section('title', '結果')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <form method="POST" action="/article/add">
                <div class="form-group">
                    {{ csrf_field() }}
                    <p class="ext-monospace">タイトル</p><input type="text" name="title" class="form-control">
                    <p class="ext-monospace">本文</p><input type="text" name="body" class="form-control">
                    <br><input type="submit" value="投稿" class="btn btn-default">
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
@endsection
