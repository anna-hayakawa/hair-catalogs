@extends('layouts.app')

@section('title', '新規登録')

{{--  navbar右側  --}}
@section('route')
<li><a class="nav-links" href="{{ route('login') }}">{{ __('message.Login') }}</a></li>
@endsection

@section('content')
<script src="{{ mix('js/register.js') }}"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card2">
                <div class="card-header">{{ __('message.Sign Up') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group1 row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('message.Name') }}</label>
                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group1 row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('message.E-Mail Address') }}</label>
                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group1 row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('message.Password') }}</label>
                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group1 row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('message.Confirm Password') }}</label>
                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <hr color="#d6c6be">
                        <div class="form-group1 row">
                            <label for="profile_image" class="col-md-3 col-form-label text-md-right">{{ __('message.Profile Image') }}</label>
                            <div class="col-md-7">
                                <label class="image-box">
                                    <input type="file" class="form-control-image @error('profile_image') is-invalid @enderror" name="profile_image" id="profile_image" accept="image/*" />
                                    @error('profile_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </label>
                                <div class="remove-box">
                                    <input type="button" class="remove-btn" name="remove" id="remove" value="画像をクリア">
                                </div>
                            </div>
                        </div>
                        <div class="form-group1 row">
                            <label for="introduction" class="col-md-3 col-form-label text-md-right">{{ __('message.Introduction') }}</label>
                            <div class="col-md-7">
                                <textarea id="introduction" class="form-control @error('introduction') is-invalid @enderror" name="introduction" rows="8">{{ old('introduction') }}</textarea>
                                @error('introduction')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group1 row mb-0">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-primary button1">
                                    {{ __('message.Register') }}
                                </button>
                            </div>
                        </div>
                        {{-- 画像クリアボタンのフラグ --}}
                        <input type="hidden" name="remove" id="remove-flag" value="0">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
