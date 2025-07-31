<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.ico">
    <!-- Scripts -->
    <livewire:styles />
    @vite(['resources/sass/app.scss'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if(Auth::user())
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item"><a class="nav-link @if(request()->routeIs('admin.users.*')) active @endif" aria-current="page" href="{{ route("admin.users.index") }}">Accounts</a></li>
                            <li class="nav-item"><a class="nav-link @if(request()->routeIs('admin.deposits.*')) active @endif" aria-current="page" href="{{ route("admin.deposits.index") }}">Deposits</a></li>
                            <li class="nav-item"><a class="nav-link @if(request()->routeIs('admin.withdrawals.*')) active @endif" aria-current="page" href="{{ route("admin.withdrawals.index") }}">Withdrawals</a></li>
                            <li class="nav-item"><a class="nav-link @if(request()->routeIs('admin.bank.*')) active @endif" aria-current="page" href="{{ route("admin.bank.index") }}">Bank Info</a></li>
                            <li class="nav-item"><a class="nav-link @if(request()->routeIs('admin.interest.*')) active @endif" aria-current="page" href="{{ route("admin.interest.index") }}">Interest</a></li>
                            <li class="nav-item"><a class="nav-link @if(request()->routeIs('admin.settings.*')) active @endif" aria-current="page" href="{{ route("admin.settings.index") }}" aria-current="page">Settings</a></li>
                            <li class="nav-item"><a class="nav-link @if(request()->routeIs('admin.log.*')) active @endif" aria-current="page" href="{{ route("admin.log.index") }}" aria-current="page">Log</a></li>
                        </ul>
                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Sign in') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Sign up') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <livewire:scripts />
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>--}}
{{--    @vite(['resources/js/ckeditor.js'])--}}
    @vite(['resources/js/app.js'])
    @if(!\App\Helper\Settings::get("acc_start_num"))
        <div class="modal fade" id="acc_start_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{route("admin.settings.id")}}" method="post" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Account start ID</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <x-form.input required="true" name="id" value="" label="ID" type="text" ></x-form.input>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            setTimeout(function (){
                window.dispatchEvent(new CustomEvent("acc_start_modal_show"));
            },300);
        </script>
    @endif
</body>
</html>
