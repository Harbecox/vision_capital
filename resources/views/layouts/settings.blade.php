@extends("layouts.admin")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="navbar">
                <ul class="navbar-nav me-auto d-flex flex-row gap-4 mb-2">
                    <li class="nav-item"><a class="nav-link @if(request()->routeIs('admin.settings.index')) active @endif" aria-current="page" href="{{ route("admin.settings.index") }}">X-date</a></li>
                    <li class="nav-item"><a class="nav-link @if(request()->routeIs('admin.settings.fee.*')) active @endif" aria-current="page" href="{{ route("admin.settings.fee.index") }}">Fees</a></li>
                    <li class="nav-item"><a class="nav-link @if(request()->routeIs('admin.settings.email.*')) active @endif" aria-current="page" href="{{ route("admin.settings.email.index") }}" >Html template</a></li>
                    <li class="nav-item"><a class="nav-link @if(request()->routeIs('admin.settings.password.*')) active @endif" aria-current="page" href="{{ route("admin.settings.password.index") }}">Password</a></li>
                </ul>
                </div>
            </div>
            <div class="col-12">
                @yield("content_s")
            </div>
        </div>
    </div>
@endsection
