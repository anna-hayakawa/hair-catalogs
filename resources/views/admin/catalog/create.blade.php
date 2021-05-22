@extends('layouts.admin')

@section('title', '新規投稿の作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>新規投稿</h2>
                <form action="{{ action('Admin\CatalogController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label class="image-box">
                                <input type="file" class="form-control-file" name="image1">画像1を選択
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="image-box">
                                <input type="file" class="form-control-file" name="image2">画像2を選択
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="image-box">
                                <input type="file" class="form-control-file" name="image3">画像3を選択
                            </label>
                        </div>
                    </div>
                    {{--  {{--  <p>
                        @foreach($tag as $tags)
                        <label>
                            <input type="checkbox" name="tags[]" value="{{ $tags->id }}">{{ $tags->name }}
                        </label>
                        @endforeach
                    </p>  --}}
                    {{--  <div class="form-group row">
                        <label class="col-md-3" for="tpo">シュチュエーション</label>
                        <div class="form-check1">
                            <label class="form-check-label">
                                <input type="checkbox" name="tpo[]" value="wedding">結婚式
                            </label>
                            <label class="form-check-label">
                                <input type="checkbox" name="tpo[]" value="event">イベント
                            </label>
                            <label class="form-check-label">
                                <input type="checkbox" name="tpo[]" value="live">ライヴ
                            </label>
                            <label class="form-check-label">
                                <input type="checkbox" name="tpo[]" value="concert">コンサート
                            </label>
                            <label class="form-check-label">
                                <input type="checkbox" name="tpo[]" value="goout">お出かけ
                            </label>
                            <label class="form-check-label">
                                <input type="checkbox" name="tpo[]" value="ceremony">卒業式
                            </label>
                            <label class="form-check-label">
                                <input type="checkbox" name="tpo[]" value="party">パーティー／お食事会
                            </label>
                            <label class="form-check-label">
                                <input type="checkbox" name="tpo[]" value="other">その他
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="arrange">アレンジ</label>
                        <div class="form-check2">
                            <label class="form-check-label">
                                <input type="checkbox" name="arrange[]" value="upstyle">アップスタイル
                            </label>
                            <label class="form-check-label">
                                <input type="checkbox" name="arrange[]" value="downstyle">ダウンスタイル
                            </label>
                            <label class="form-check-label">
                                <input type="checkbox" name="arrange[]" value="halfup">ハーフアップ
                            </label>
                            <label class="form-check-label">
                                <input type="checkbox" name="arrange[]" value="ponytail">ポニーテール
                            </label>
                            <label class="form-check-label">
                                <input type="checkbox" name="arrange[]" value="bun">お団子
                            </label>
                            <label class="form-check-label">
                                <input type="checkbox" name="arrange[]" value="buncheshair">ツインテール
                            </label>
                            <label class="form-check-label">
                                <input type="checkbox" name="arrange[]" value="shinyon">夜会巻き
                            </label>
                            <label class="form-check-label">
                                <input type="checkbox" name="arrange[]" value="updo">まとめ髪
                            </label>
                        </div>
                    </div>  --}}
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="caption">サブタイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="caption" value="{{ old('caption') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">説明</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="description" rows="15">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-6">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="投稿">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
