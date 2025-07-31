@extends('layouts.app')

@section('content')
    <div class="container login-container">
        <div class="row login-row">

                    <form method="POST" action="{{ route('password.email') }}" class="login-form">
                        @csrf
                        <div class="form-group medium @error("email") error @enderror">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="login-input" name="email" value="{{ old('email') }}">
                            @error("email") <small>{{ $message }}</small> @enderror
                        </div>
                        <br>
                        <div class="form-group large @error("secret_question") error @enderror">
                            <label>Security Question</label>
                            <input type="text" name="secret_question">
                            @error("secret_question") <small>{{ $message }}</small>@endif
                        </div>
                        <br>
                        <div class="form-group large @error("secret_answer") error @enderror">
                            <label>Answer</label>
                            <input type="text" name="secret_answer">
                            @error("secret_answer") <small>{{ $message }}</small>@endif
                        </div>
                        <br>
                        <div class="quest__form-btn">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert" style="color:#0dd157;text-align: center;padding: 10px;">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
