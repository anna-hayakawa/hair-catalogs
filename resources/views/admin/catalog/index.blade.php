@extends('layouts.admin')

@section('title', 'マイページ')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>マイページ</h2>
            </div>
            <div class="col-md-5 text-right">
                <a href="{{ action('Admin\CatalogController@add') }}" role="button" class="btn btn-primary btn-1">新規投稿</a>
            </div>
            <div class="col-md-5 offset-md-2 text-left">
                <a href="{{ action('Admin\ProfileController@edit') }}" role="button" class="btn btn-primary btn-1">プロフィール編集</a>
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
                        <label class="col-md-3 text-right title-label">タイトル検索</label>
                        <div class="col-md-7 search-box1">
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
                                <th width="7%">ID</th>
                                <th width="15%">タイトル</th>
                                <th width="15%">サブタイトル</th>
                                <th width="40%">説明</th>
                                <th width="23%">画像</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $style)
                                @if ($style->user_id == Auth::user()->id)
                                    <tr>
                                        <th>{{ $style->id }}</th>
                                        <td>{{ str_limit($style->title, 100) }}</td>
                                        <td>{{ str_limit($style->caption, 100) }}</td>
                                        <td>{{ str_limit($style->description, 250) }}</td>
                                        <td><img src="{{ asset('storage/image/' . $style->image_path1) }}" width="150" height="100"></td>
                                        {{--  <td>
                                            <div>
                                                <a href="{{ action('Admin\NewsController@edit', ['id' => $news->id]) }}">編集</a>
                                            </div>
                                            <div>
                                                <a href="{{ action('Admin\NewsController@delete', ['id' => $news->id]) }}">削除</a>
                                            </div>
                                        </td>  --}}
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
