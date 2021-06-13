@extends('layouts.admin')

@section('title', '投稿の編集')

@section('content')
<script src="{{ mix('js/hoge.js') }}"></script>
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <h2>投稿の編集</h2>
            <form action="{{ action('Admin\CatalogController@update') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-group row image-boxes">
                    <div class="col-md-4 text-center">
                        <label class="image-box1">
                            <input type="file" class="form-control-file" name="image1" id="image1" accept="image/*"
                            @if ($style_form->image_path1 !='')
                                data-image="{{ asset('storage/image/' . $style_form->image_path1) }}"
                            @else
                                data-def_image=""
                            @endif
                        /></label>
                        <p class="labels">
                            画像1
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <label class="image-box2">
                            <input type="file" class="form-control-file" name="image2" id="image2" accept="image/*"
                            @if ($style_form->image_path2 !='')
                                data-image="{{ asset('storage/image/' . $style_form->image_path2) }}"
                            @else
                                data-def_image=""
                            @endif
                        /></label>
                        <p class="labels">
                            画像2
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <label class="image-box3">
                            <input type="file" class="form-control-file" name="image_path3" id="image3" accept="image/*"
                            @if ($style_form->image_path3 !='')
                                data-image="{{ asset('storage/image/' . $style_form->image_path3) }}"
                            @else
                                data-def_image=""
                            @endif
                        /></label>
                        <p class="labels">
                            画像3
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 labels" for="tpo">シチュエーション</label>
                    <p>
                        @foreach($tags as $key => $tag)
                        <label class="checkbox" for="hair_tags-{{ $tag->id }}">
                            {{ Form::checkbox('tag_id[]', $tag->id, in_array($tag->id, $hair_tags, true), ['id' => 'hair_tags-' . $tag->id]) }}
                            {{ $tag->tag_name }}
                        </label>
                        @endforeach
                    </p>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 labels" for="title">タイトル</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="title" value="{{ $style_form->title }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 labels" for="caption">サブタイトル</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="caption" value="{{ $style_form->caption }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 labels" for="body">説明</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="description" rows="15">{{ $style_form->description }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-6">
                        <input type="hidden" name="style_id" value="{{ $style_form->id }}">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary button" value="更新">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
