@extends('layouts.admin')

@section('title', 'プロフィール編集')

@section('content')
<script src="{{ mix('js/profile.js') }}"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ action('Admin\ProfileController@update') }}" method="POST" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group-profile row ">
                        <div class="col-md-4 image-box">
                            <img class="img1" id="img1" src="{{ asset('storage/image/' . $profile_form->image_path) }}">
                            <div class="col-md-6">
                                <label class="image-btn">
                                    画像を変更する
                                <input type="file" class="form-control-file" name="image" style="display: none">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-8 name-box">
                            <label class="col-md-8 name-label" for="name">名前</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group-profile row">
                        <label class="col-md-2 intro-label" for="introduction">自己紹介</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="introduction" rows="10">{{ $profile_form->introduction }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-4">
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary btn-pri" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

