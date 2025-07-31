@extends('layouts.register')

@section("prc")
    80%
@endsection

@section('step')
    <div class="quest__item active">
        <div class="quest__page">
            <div class="quest__page-bg">
                <img src="/img/quest-bg.jpg" alt="">
            </div>
            <div class="quest__page-form">
                <div class="quest__page-cot">
                    <div class="quest__page-title">Choose your username and password</div>
@php
/* echo "<pre>";
print_r($user_data);
echo "</pre>"; */
@endphp
                    <form method="post" action="{{ route("register.step",3) }}" class="quest__form">
                        @csrf
                        <div class="form-group small @error("username") error @enderror">
                            <label>Username* </label>
                            <input type="text" value="{{ old("username") }}" name="username" required>
                            @error("username") <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group small @error("password") error @enderror">
                            <label>Password*</label>
                            <input type="password" value="{{ old("password") }}" name="password" required>
                            @error("password") <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group small @error("password") error @enderror">
                            <label>Password*</label>
                            <input type="password" value="{{ old("password_confirmation") }}"
                                   name="password_confirmation" required>
                            @error("password") <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group large">
                            <label>Choose a Security Question</label>
                            <select class="small" name="secret_question">
                                <option>What was the name of your first pet?</option>
                                <option>What was the name of your elementary school?</option>
                                <option>What is the name of the city where you were born?</option>
                                <option>What was your childhood nickname?</option>
                                <option>What is your mother's maiden name?</option>
                                <option>What is the name of your favorite teacher?</option>
                            </select>
                        </div>
                        <div class="form-group large">
                            <label>Choose an Answer</label>
                            <input type="text" value="{{ old("secret_answer") }}" name="secret_answer">
                        </div>
                        <div class="quest__form-btn">
                            <button class="btn">Сontinue</button>
                        </div>
                        <div style="display: flex;align-items: center;width: 100%;margin-top: 50px;flex-direction: column">
                            <img src="/img/secure.jpg" style="width: 200px">
                            <h4 style="text-align: left;margin: 20px;width: 100%">Important information about procedures for opening a new account:</h4>
                            <p>To help the government fight the funding of terrorism and money laundering activities, Federal law requires all financial institutions to obtain, verify, and record information that identifies each person who opens an account.</p>
                            <h4  style="text-align: left;margin: 20px;width: 100%">What this means for you:</h4>
                            <p>When you open an account, we will ask for your name, address, date of birth, and other information that will allow us to identify you. We may also utilize a third-party information provider for verification purposes and/or ask for a copy of your driver's license or other identifying documents.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
