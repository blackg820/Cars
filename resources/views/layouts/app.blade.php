<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}?key=<?php echo time(); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}?key=<?php echo time(); ?>" rel="stylesheet">
</head>
<style>
    .dropdown-toggle::after {
        content: none;
    }

</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

 
                @if (request()->routeIs('welcome') || request()->routeIs('welcome.show'))
                    <form method="POST" action="{{ route('welcome.show') }}" class="form-inline my-2 my-lg-0">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <select name="Cityselect" class="form-control mr-sm-2 selectpicker"
                                    data-live-search="true" id="Cityselect">
                                    @forelse($cities as $city)
                                        <option value="{{ $city->id }}" data-tokens="{{ $city->college }}">
                                            {{ $city->city }} - {{ $city->college }}</option>
                                    @empty
                                        <option value="0">Empty</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <select name="modelselect" class="form-control mr-sm-2 selectpicker"
                                    data-live-search="true" id="modelselect">
                                    @forelse($models as $model)
                                        <option>{{ $model->car_model }}</option>
                                    @empty
                                        <option value="0">Empty</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <!--<form-->
                        <!--class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">-->
                        <div class="input-group">
                            <input name="search" type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="submit">
                                    <x-bi-search/>
                                </button>
                            </div>
                        </div>
                    <!--</form>-->
                        <!--<input name="search" class="form-control mr-sm-2" type="search" placeholder="Search"-->
                        <!--    aria-label="Search" id="search">-->
                        <!--<button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>-->
                    </form>
                @endif
                                   <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (!request()->routeIs('login'))
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                            @endif
                            @if (!request()->routeIs('register'))
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @endif
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-gear-wide-connected" viewBox="0 0 16 16">
                                        <path
                                            d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z" />
                                    </svg>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <div class="dropdown-item {{ request()->routeIs('home') ? 'active' : '' }}">
                                                <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                                            </div>
                                        @can('edit-users')
                                            <div class="dropdown-item {{ request()->routeIs('user.index') ? 'active' : '' }}">
                                                <a class="nav-link" href="{{ route('user.index') }}">{{ __('Edit Users') }}</a>
                                            </div>
                                        @endcan
                                        @can('edit-location')
                                            <div class="dropdown-item {{ request()->routeIs('location.index') ? 'active' : '' }}">
                                                <a class="nav-link" href="{{ route('location.index') }}">{{ __('Edit Location') }}</a>
                                            </div>
                                        @endcan
                                        @can('edit-profile')
                                            <div class="dropdown-item {{ request()->routeIs('profile.index') ? 'active' : '' }}">
                                                <a class="nav-link" href="{{ route('profile.index') }}">{{ __('Edit Profile') }}</a>
                                            </div>
                                        @endcan
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
               <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
