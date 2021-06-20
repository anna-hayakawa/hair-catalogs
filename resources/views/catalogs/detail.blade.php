@extends('layouts.front')

@section('title', '【' . $style->title . '】' . 'の詳細ページ')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="col-md-12 detail-box">
                    <div class="col-md-7 mx-auto image-box">
                        @if ($style->image_path1 != null)
                            <img src="{{ asset('storage/image/' . $style->image_path1) }}" alt="" onerror="this.src='/images/lady_icon.png'" />
                        @else
                            <img alt="">
                        @endif
                        <div class="col-md-12">
                            <div class="col-md-12 title-box">
                                <div class="title-text">
                                    {{ '【' . $style->title . '】' }}
                                </div>
                            </div>
                            <div class="col-md-12 caption-box">
                                <div class="caption-text">
                                    {{ $style->caption }}
                                </div>
                            </div>
                            <div class="col-md-12 desc-box">
                                <div class="desc-text">
                                    {{ $style->description }}
                                </div>
                            </div>
                            <div class="col-md-6 updated-box">
                                <div class="updated-text">
                                    {{ "投稿日：" . $style->updated_at->format('Y年m月d日') }}
                                </div>
                            </div>
                            <div class="col-md-12 tpo-box">
                                <div class="tpo-label">
                                    <p>シチュエーション</p>
                                </div>
                                <div class="tag-box">
                                    @foreach ($tags as $tag)
                                        <label class="tag-name">
                                            {{ $tag->tag_name }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12 user-box">
                                <div class="user-label">
                                    <p>投稿者</p>
                                </div>
                                <div class="col-md-4 image-box">
                                    @if ($profile_form->image_path != null)
                                        <img src="{{ asset('storage/image/' . $profile_form->image_path) }}" alt="" onerror="this.src='/images/default_profile_icon.png'" />
                                    @else
                                        <img alt="">
                                    @endif
                                    <div class="name-text">
                                        {{ $profile_form->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
