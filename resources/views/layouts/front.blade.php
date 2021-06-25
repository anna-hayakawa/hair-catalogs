<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <script src="{{ asset('js/app.js') }}" defer></script>

        <link rel="dns-prefetch" href="https://fonts.gstatic.com" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/front.css') }}" />
    </head>
    <body>
        <div id="app">
            {{--  ナビゲーションバー  --}}
            <nav class="navbar navbar-expand-md navbar-laravel">
                <div class="container">
                    {{-- ロゴ --}}
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img class="logo-icon" src={{ asset('images/salon_icon.png') }}>
                        {{ config('app.name', 'HairCatalogs') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        {{--  navbar右側  --}}
                        <ul class="navbar-nav ml-auto">
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('message.Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('message.Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img class="logo-icon2" src="{{ asset('images/hamburger_menu.png') }}">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ action('Admin\CatalogController@index') }}" onclick="submit()">
                                        {{ __('message.MyPage') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('message.Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <div class="user-name">
                                <p>{{ Auth::user()->name }}</p>
                            </div>
                        @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>
