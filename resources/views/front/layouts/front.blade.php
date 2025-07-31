<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="format-detection" content="telephone=no">


    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/css/style.css">

</head>
<body>
<!--  ClickCease.com tracking-->
<script type='text/javascript'>var script = document.createElement('script');
    script.async = true; script.type = 'text/javascript';
    var target = 'https://www.clickcease.com/monitor/stat.js';
    script.src = target;var elem = document.head;elem.appendChild(script);
</script>
<noscript>
    <a href='https://www.clickcease.com' rel='nofollow'><img src='https://monitor.clickcease.com' alt='ClickCease'/></a>
</noscript>

<header class="header">
    <div class="row">
        <div class="header__humb"><i></i></div>
        <a href="/" class="header__logo"><img src="/img/logo.svg" alt=""></a>
        <div class="header__nav">
            <i></i>
            <ul>
                <li @if(request()->routeIs("home")) class="active"        @endif><a href="/">Home</a></li>
                <li @if(request()->routeIs("growth_fund")) class="active" @endif><a href="{{route('growth_fund')}}">Growth Fund</a></li>
                <li @if(request()->routeIs("performance")) class="active" @endif><a href="{{route('performance')}}">Performance</a></li>
                <li @if(request()->routeIs("about_us"))    class="active" @endif><a href="{{route('about_us')}}"     >About Us</a></li>
                <li @if(request()->routeIs("contact_us"))  class="active" @endif><a href="{{route('contact_us')}}"   >Contact Us</a></li> -->
            </ul>
        </div>

        <a href="{{route('dashboard.index')}}" class="header__office"><img src="/img/icon-office.svg" alt=""></a>
    </div>
</header>
<main class="py-4">
    @yield('content')
</main>
<footer class="footer">
    <div class="row">
        <div class="footer__base">
            <a href="/" class="footer__logo"><img src="/img/logo-white.svg" alt=""></a>
            <div class="footer__nav">
                <ul>

                    <li @if(request()->routeIs("home"))        class="active" @endif><a href="/">Home</a></li>
                    <li @if(request()->routeIs("growth_fund")) class="active" @endif><a href="{{route('growth_fund')}}">Growth Fund</a></li>
                    <li @if(request()->routeIs("performance")) class="active" @endif><a href="{{route('performance')}}">Performance</a></li>
                    <li @if(request()->routeIs("about_us"))    class="active" @endif><a href="{{route('about_us')}}">About Us</a></li>
                    <li @if(request()->routeIs("contact_us"))  class="active" @endif><a href="{{route('contact_us')}}">Contact Us</a></li> -->
                </ul>
            </div>
        </div>
        <div class="footer__info">
            <div class="footer__info-copy">© 2024 VisionCapital. All rights reserved.</div>
            <div class="footer__info-link">
                <a href="{{route('privacy')}}">Privacy Policy</a>
                <a href="{{route('cookies')}}">Cookies</a>
                <a href="{{route('terms')}}">Terms and Conditions</a>
            </div>
            <div class="footer__info-contact">
                <a href="mailto:info@visioncapitalgf.com"><i><img src="/img/icon-email.svg"></i>info@visioncapitalgf.com</a>
                <a href="tel:+18772252155"><i><img src="/img/icon-phone.svg"></i><b>+1-877-225-2155</b></a>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/js/script.js"></script>
</body>
</html>
