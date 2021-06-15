@extends('layouts.admin')

@section('title', 'マイページ')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>マイページ</h2>
            </div>
            {{--  ボタン  --}}
            <div class="col-md-5 text-right">
                <a href="{{ action('Admin\CatalogController@add') }}" role="button" class="btn btn-primary btn-1">新規投稿の作成へ</a>
            </div>
            <div class="col-md-5 offset-md-2 text-left">
                <a href="{{ action('Admin\ProfileController@index') }}" role="button" class="btn btn-primary btn-1">プロフィール画面へ</a>
            </div>
        </div>
        <div class="row">
            <div class="list col-md-12 mx-auto">
            <hr color="#d6c6be">
                <div class="col-md-12 mx-auto">
                    <h4>投稿一覧</h4>
                </div>
                {{--  タイトル／説明の検索  --}}
                <form action="{{ action('Admin\CatalogController@index') }}" method="get">
                    <div class="form-group row float-md-right">
                        <label class="col-md-4 text-right title-label">タイトル／説明で検索</label>
                        <div class="col-md-6 search-box1">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary search-btn" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            {{--  投稿一覧  --}}
            <div class="list-catalog col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-borderless table-catalog ">
                        <thead>
                            <tr>
                                <th width="7%">ID</th>
                                <th width="18%">タイトル</th>
                                <th width="17%">サブタイトル</th>
                                <th width="30%">説明</th>
                                <th width="18%">画像</th>
                                <th width="10%"></th>
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
                                        <td>
                                            <div>
                                                <a class="btn" href="{{ action('Admin\CatalogController@edit', ['id' => $style->id]) }}">編集</a>
                                            </div>
                                            <div>
                                                <a class="btn" href="{{ action('Admin\CatalogController@delete', ['id' => $style->id]) }}">削除</a>
                                            </div>
                                        </td>
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
