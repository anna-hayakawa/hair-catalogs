@extends('layouts.admin')

@section('title', 'プロフィール')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>プロフィール</h2>
            </div>
            <div class="col-md-12 profile-box row ">
                <div class="col-md-4 image-box">
                    <img id="img1" src="{{ asset('storage/image/' . $profile_form->image_path) }}">
                </div>
                <div class="col-md-8">
                    <div class="col-md-4 name-box">
                        <div class="name-label">
                            {{ $profile_form->name }}
                        </div>
                    </div>
                    <div class="col-md-8 intro-box">
                        <div class="intro-label">
                            {{ $profile_form->introduction }}
                        </div>
                    </div>
                </div>
                @if ($profile_form->id == Auth::user()->id)
                    <div class="col-md-3 edit-btn-box">
                        <a href="{{ action('Admin\ProfileController@edit') }}" role="button" class="btn btn-primary edit-btn">プロフィールを編集する</a>
                    </div>
                @endif
            </div>
        </div>
        <hr color="#d6c6be">
        <div class="col-md-12 mx-auto">
            <h4 class="h4-label">投稿一覧</h4>
        </div>
        <div class="style-list col-md-12 mx-auto row">
            @foreach ($posts as $style)
                @if ($style->user_id == Auth::user()->id)
                    <a href="{{ action('CatalogsController@detail') }}">
                        <div class="style">
                            <div class="image col-md-12">
                                <img src="{{ asset('storage/image/' . $style->image_path1) }}"  width="245" height="270">
                            </div>
                            <div class="text col-md-12">
                                <div class="title-label">
                                    {{ str_limit($style->title, 150) }}
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
