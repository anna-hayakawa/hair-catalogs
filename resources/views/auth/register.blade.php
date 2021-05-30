@extends('layouts.app')

@section('title', '新規登録')

@section('route')
<li><a class="nav-link" href="{{ route('login') }}">{{ __('message.Login') }}</a></li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('message.Sign Up') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
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
                        <div class="form-group row">
                            <label for="email1" class="col-md-3 col-form-label text-md-right">{{ __('message.E-Mail Address') }}</label>
                            <div class="col-md-7">
                                <input id="email1" type="email" class="form-control" name="email" value="{{ old('email1') }}" required autocomplete="email">
                            </div>
                        </div>
                        <div class="form-group row">
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
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('message.Confirm Password') }}</label>
                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profile_image" class="col-md-3 col-form-label text-md-right">{{ __('message.Profile Image') }}</label>
                            <div class="col-md-7">
                                <input id="profile_image" type="file" class="form-control-image" name="profile_image" value="{{ old('profile_image') }}" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="introduction" class="col-md-3 col-form-label text-md-right">{{ __('message.Introduction') }}</label>
                            <div class="col-md-7">
                                <textarea id="introduction" class="form-control" name="introduction" rows="10">{{ old('introduction') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('message.Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
