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
                    <div class="col-md-12 profile-box1 row">
                        <div class="col-md-4 image-boxes">
                            <label class="image-box">
                                <input type="file" class="form-control-file" name="image" id="image" accept="image/*"
                                @if ($profile_form->image_path !='')
                                    data-image="{{ asset('storage/image/' . $profile_form->image_path) }}"
                                @else
                                    data-def_image=""
                                @endif
                                />
                            </label>
                            <div class="remove-box">
                                <input type="button" class="remove-btn" name="remove" id="remove" value="画像をクリア">
                            </div>
                        </div>
                        <div class="col-md-8 name-box">
                            <label class="col-md-8 name-label" for="name">名前</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 profile-box2 row text-right">
                        <label class="col-md-1 intro-label" for="introduction">自己紹介</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="introduction" rows="10">{{ $profile_form->introduction }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-4">
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary update-btn" value="更新">
                        </div>
                    </div>
                    {{-- 画像クリアボタンのフラグ --}}
                    <input type="hidden" name="remove" id="remove-flag" value="0">
                </form>
            </div>
        </div>
    </div>
@endsection

