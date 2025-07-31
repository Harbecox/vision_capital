@extends('layouts.app')

@section('content')
    <div class="container login-container">
        <div class="row login-row">
            <form method="POST" action="{{ route('admin.login') }}" class="login-form">
                @csrf
                <div class="form-group medium @error("email") error @enderror">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="login-input" name="email" value="{{ old('email') }}">
                    @error("email") <small>{{ $message }}</small> @enderror
                </div>

                <div class="form-group medium @error("password") error @enderror">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="login-input" name="password" required>
                    @error("password") <small>{{ $message }}</small> @enderror
                </div>

                <div class="form-check" style="margin-top: 15px">
                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>


                <div class="login-signup">

                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                </div>
        </form>
    </div>
    </div>


@endsection
