@extends('layouts.app')

@section('content')
    <div class="container login-container">
        <div class="row login-row">
            <form action="{{route('login')}}" method="post" class="login-form">
                @csrf
                <div class="form-group medium @error("username") error @enderror">

                    <label for="email" class="form-label">{{ __('Username') }}</label>
                    <input id="email" class="login-input " name="username" value="{{ old('username') }}">
                    @error("username") <small>{{ $message }}</small> @enderror

                </div>

                <div class="form-group medium @error("password") error @enderror">
                    <label for="password" class="form-label login-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="login-input" name="password" required
                           autocomplete="current-password">
                    @error("password") <small>{{ $message }}</small> @enderror
                </div>
                <div class="form-check" style="margin-top: 15px;display: flex;justify-content: space-between">
                    <div>
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a  href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
                <br>
                {!! htmlFormSnippet() !!}
                <div class="login-signup">

                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    <a href="{{ route('register') }}">
                        {{ __("Sign up") }}
                    </a>

                </div>
            </form>
        </div>
    </div>

@endsection

