@extends('layouts.admin')

@section('title', 'プロフィール')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>プロフィール</h2>
            </div>
            {{-- プロフィール詳細 --}}
            <div class="col-md-12 profile-box row ">
                <div class="col-md-4 image-box">
                    @if ($profile_form->image_path != '')
                        <img src="{{ $profile_form->image_path }}" alt="" onerror="this.src='/images/default_profile_icon.png'" />
                    @else
                        <img alt="">
                    @endif
                    @if ($profile_form->id == Auth::user()->id)
                    <div class="col-md-12 edit-btn-box">
                        <a href="{{ route('profile.edit', ['user_id' => $profile_form->id]) }}" role="button" class="btn btn-primary edit-btn">プロフィールを編集する</a>
                    </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="col-md-12 name-box">
                        <div class="name-text">
                            {{ $profile_form->name }}
                        </div>
                    </div>
                    <div class="col-md-12 intro-box">
                        <div class="intro-text">
                            {{ $profile_form->introduction }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <hr color="#d6c6be">
        </div>
        {{-- 投稿一覧 --}}
        <div class="col-md-12 mx-auto">
            <h4 class="h4-label">投稿一覧</h4>
        </div>
        <div class="style-list col-md-12 mx-auto row">
            @foreach ($posts as $style)
                @if ($style->user_id == $profile_form->id)
                    <a href="{{ route('catalogs.detail', ['catalog_id' => $style->id]) }}">
                        <div class="style">
                            <div class="image col-md-12">
                                <img src="{{ $style->image_path1 }}"  width="245" height="270">
                            </div>
                            <div class="text col-md-12">
                                <div class="title-label">
                                    {{ str_limit($style->title, 62) }}
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
            <div class="col-md-12">
                <button class="more-btn">もっと見る</button>
            </div>
        </div>
    </div>
@endsection
