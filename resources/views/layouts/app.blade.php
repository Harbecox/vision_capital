<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Vision Capital Dashboard</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <!-- Scripts -->
    <livewire:styles/>
{{--    @vite(['resources/sass/app.scss'])--}}
    @yield("header_script")
    {!! htmlScriptTagJsApi([]) !!}
</head>
<body>
<div id="app">
    @if(!request()->routeIs("register.*"))
    <header class="header mode">

        <div class="row min">
            <div class="header__humb"><i></i></div>
            <a href="/" class="header__logo"><img src="/img/logo.svg" alt=""></a>
            <div class="header__nav">
                    <i></i>

                    @if(Auth::user())
                    <ul>
                        <li class="nav-item"><a class="nav-link @if(request()->routeIs('dashboard.index')) active @endif" aria-current="page" href="{{ route("dashboard.index") }}"><s><img src="/img/icon-nav1.svg" class="svg"></s>Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link @if(request()->routeIs('dashboard.deposits.*')) active @endif" aria-current="page" href="{{ route("dashboard.deposits.index") }}"><s><img src="/img/icon-nav2.svg" class="svg"></s>Deposits</a></li>
                        <li class="nav-item"><a class="nav-link @if(request()->routeIs('dashboard.withdrawals.*')) active @endif" aria-current="page" href="{{ route("dashboard.withdrawals.index") }}"><s><img src="/img/icon-nav3.svg" class="svg"></s>Withdrawals</a></li>
                        <li class="nav-item"><a class="nav-link @if(request()->routeIs('dashboard.settings.*')) active @endif" aria-current="page" href="{{ route("dashboard.settings.index") }}"><s><img src="/img/icon-nav4.svg" class="svg"></s>Settings</a></li>
                    </ul>
                @else
                    <ul>
                        <li class="active"><a href="/">Home</a></li>
                        <!-- <li><a href="/growth_fund">Growth Fund</a></li>
                        <li><a href="/performance">Performance</a></li>
                        <li><a href="/about_us">About Us</a></li>
                        <li><a href="/contact_us">Contact Us</a></li> -->
                    </ul>
                    @endif
                </div>
                @if(\Illuminate\Support\Facades\Auth::user())
                <div class="header__name" style="text-align: center">
                    {{\Illuminate\Support\Facades\Auth::user()->info[0]->first_name .' '.\Illuminate\Support\Facades\Auth::user()->info[0]->last_name}} <i></i>
                </div>
                @endif

                @if(\Illuminate\Support\Facades\Auth::user())
                <form action="{{route('logout')}}" method="post" class="header__logout">
                        @csrf
                        <img src="/img/icon-logout.svg" alt="">
                    <button type="submit">Log Out</button>
                </form>
                 @endif
        </div>


    </header>
    @endif
<main class="py-4">
        @yield('content')
    </main>
</div>

<livewire:scripts/>
@vite(['resources/js/app.js'])
<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/js/moment.min.js"></script>
<script type="text/javascript" src="/js/script.js"></script>

</body>
</html>
