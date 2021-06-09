@extends('layouts.admin')

@section('title', 'プロフィール')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2>プロフィール</h2>
            </div>
            <div class="form-profile row ">
                @if ($profile_form->id == Auth::user()->id)
                    <div class="col-md-4 image-box">
                        <img class="img1" id="img1" src="{{ asset('storage/image/' . $profile_form->image_path) }}">
                    </div>
                    <div class="col-md-8 name-box">
                        <label class="col-md-8 name-label" for="name">名前</label>
                        <div class="col-md-8">
                            {{ $profile_form->name }}
                        </div>
                    </div>
                    <div class="form-group-profile row">
                        <label class="col-md-2 intro-label" for="introduction">自己紹介</label>
                        <div class="col-md-8">
                            {{ $profile_form->introduction }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
