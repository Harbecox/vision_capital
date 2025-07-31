@extends('layouts.app')

@section('content')
    <div class="container login-container">
        <div class="row login-row">

                    <form method="POST" action="{{ route('password.update') }}" class="login-form">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group medium @error("email") error @enderror">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="login-input" name="email" value="{{ old('email') }}">
                            @error("email") <small>{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group medium @error("password") error @enderror">
                            <label for="password" class="form-label login-label">{{ __('New Password') }}</label>
                            <input id="password" type="password" class="login-input" name="password" required
                                   autocomplete="current-password">
                            @error("password") <small>{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group medium @error("password-confirmation") error @enderror">
                            <label for="password-confirm" class="form-label login-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="login-input" name="password_confirmation" required
                                   autocomplete="current-password">
                            @error("password-confirmation") <small>{{ $message }}</small> @enderror
                        </div>

                       <div class="login-signup">
                           <button type="submit" class="btn btn-primary">
                               {{ __('Reset Password') }}
                           </button>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
