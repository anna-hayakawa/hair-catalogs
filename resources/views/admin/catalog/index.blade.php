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
                <a href="{{ route('profile', ['user_id' => Auth::user()->id]) }}" role="button" class="btn btn-primary btn-1">プロフィール画面へ</a>
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
                        <label class="col-md-4 text-right title-desc-label">タイトル／説明で検索</label>
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
                    <table class="table table-borderless table-catalog">
                        <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th width="18%">タイトル</th>
                                <th width="13%">サブタイトル</th>
                                <th width="30%">説明</th>
                                <th width="13%" class="image">画像</th>
                                <th width="12%" class="dated_at">更新日</th>
                                {{-- <th width="12%" class="dated_at">作成日／更新日</th> --}}
                                <th width="9%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $index=>$style)
                                <tr>
                                        {{--  ユーザーの全投稿数がわかるように、created_atの降順とし、カウントダウンでNo.を取得する  --}}
                                    <th>{{ $posts->total() - $index - (($posts-> currentPage()-1) * $posts->perPage()) }}</th>{{--  $indexは、foreachの周期／$currentPageは、現在のページ／$perPageは、ページ毎に何件データを表示するか --}}
                                    <td>
                                        <a href="{{ route('catalogs.detail', ['catalog_id' => $style->id]) }}">
                                            {{ str_limit($style->title, 100) }}
                                        </a>
                                    </td>
                                    <td>{{ str_limit($style->caption, 100) }}</td>
                                    <td>{{ str_limit($style->description, 250) }}</td>
                                    <td><img src="{{ asset('storage/image/' . $style->image_path1) }}" width="120" height="100"></td>
                                    @if ($style->updated_at != $style->created_at)
                                        <td class="dated_at">{{ $style->updated_at->format('Y年m月d日') }}</td>
                                    @else
                                        <td class="dated_at"></td>
                                    @endif
                                    <td class="btn-boxes">
                                        <div class="btn-box">
                                            <a class="btn" href="{{ action('Admin\CatalogController@edit', ['id' => $style->id]) }}">編集</a>
                                        </div>
                                        <div class="btn-box">
                                            <a class="btn" href="{{ action('Admin\CatalogController@delete', ['id' => $style->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                    {{ $posts->appends($params)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
