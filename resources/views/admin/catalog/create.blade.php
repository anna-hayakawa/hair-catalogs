@extends('layouts.admin')

@section('title', '新規投稿の作成')

@section('content')
<script src="{{ mix('js/hoge.js') }}"></script>
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
                            <label class="image-box1">
                                <input type="file" class="form-control-file" name="image1" id="image1" accept="image/*" />
                            </label>
                            <p class="btn_upload">
                                画像1
                            </p>
                        </div>
                        <div class="col-md-4">
                            <label class="image-box2">
                                <input type="file" class="form-control-file" name="image2" id="image2" accept="image/*" />
                            </label>
                            <p class="btn_upload">
                                画像2
                            </p>
                        </div>
                        <div class="col-md-4">
                            <label class="image-box3">
                                <input type="file" class="form-control-file" name="image3" id="image3" accept="image/*" />
                            </label>
                            <p class="btn_upload">
                                画像3
                            </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="tpo">シチュエーション</label>
                        <p>
                            @foreach($tags as $tag)
                            <label>
                                <input type="checkbox" name="tag_id[]" value="{{ $tag->id }}">{{ $tag->tag_name }}
                            </label>
                            @endforeach
                        </p>
                    </div>
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
