@extends('layouts.admin')

@section('title', 'マイページ')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>マイページ</h2>
            </div>
            <div class="col-md-4 text-right">
                <a href="{{ action('Admin\CatalogController@add') }}" role="button" class="btn btn-primary btn-1">新規投稿</a>
            </div>
            <div class="col-md-4 offset-md-3 text-left">
                <a href="{{ action('Admin\CatalogController@add') }}" role="button" class="btn btn-primary btn-1">プロフィール編集</a>
            </div>
        </div>
        <div class="row">
            <div class="list col-md-12 mx-auto">
            <hr color="#c0c0c0">
                <div class="col-md-12 mx-auto">
                    <h4>投稿一覧</h4>
                </div>
                <form action="{{ action('Admin\CatalogController@index') }}" method="get">
                    <div class="form-group row float-md-right">
                        <div class="col-md-9 search-box">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="20%">サブタイトル</th>
                                <th width="50%">説明</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @foreach($posts as $news)
                                <tr>
                                    <th>{{ $news->id }}</th>
                                    <td>{{ str_limit($news->title, 100) }}</td>
                                    <td>{{ str_limit($news->body, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\NewsController@edit', ['id' => $news->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\NewsController@delete', ['id' => $news->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
