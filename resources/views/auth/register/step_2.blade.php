@extends('layouts.register')

@section("prc")60% @endsection

@section('step')
    <div class="quest__item active">
        <div class="quest__page">
            <div class="quest__page-bg">
                <img src="/img/quest-bg.jpg" alt="">
            </div>
            <div class="quest__page-form">
                <div class="quest__page-cot">
                    <div class="quest__page-title">Step 1</div>
                    <div class="quest__page-title">First, we'll need a few details</div>
                    @if($account == "joint")
                        <div class="quest__page-title">Account Holder {{ $holder }}</div>
                    @endif
                    <form class="quest__form" method="POST" action="{{ route("register.step",2) }}">
                        @csrf
                        @if($account == "joint")
                            <input type="hidden" name="holder" value="{{ $holder }}">
                        @endif


                        <input type="hidden" name="account" value="{{ $account }}">
                        <div class="form-group small @error("first_name") error @enderror">
                            <label>First Name</label>
                            <input type="text" value="{{ old("first_name") }}" name="first_name" required>
                            @error("first_name") <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group small @error("middle_name") error @enderror">
                            <label>Middle Name</label>
                            <input type="text" value="{{ old("middle_name") }}" name="middle_name">
                            @error("middle_name") <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group small @error("last_name") error @enderror">
                            <label>Last Name</label>
                            <input type="text" value="{{ old("last_name") }}" name="last_name" required>
                            @error("last_name") <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group medium @error("phone") error @enderror">
                            <label>Phone Number</label>
                            <input type="text" value="{{ old("phone") }}" name="phone" required>
                            @error("phone") <small>{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group medium @error("email") error @enderror">
                            <label>E-mail</label>
                            <input type="text" value="{{ old("email") }}" name="email" required>
                            @error("email") <small>{{ $message }}</small> @enderror
                        </div>
{{--                        <div class="form-group medium">--}}
{{--                            <label>Birth Date</label>--}}
{{--                            <div class="form-group-block">--}}
{{--                                <select name="month" class="medium @error("month") error @enderror" id="monthDropdown">--}}
{{--                                    <option disabled selected value="0">Month</option>--}}
{{--                                </select>--}}


{{--                                <select name="day" class="small @error("day") error @enderror" id="dayDropdown">--}}
{{--                                    <option disabled selected value="0">Day</option>--}}
{{--                                </select>--}}


{{--                                <select name="year" class="small @error("year") error @enderror" id="yearDropdown">--}}
{{--                                    <option disabled selected value="0">Year</option>--}}
{{--                                </select>--}}

{{--                            </div>--}}
{{--                            @error("month") <small>{{ $message }}</small> @enderror--}}
{{--                            @error("day") <small>{{ $message }}</small> @enderror--}}
{{--                            @error("year") <small>{{ $message }}</small> @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group medium">--}}
{{--                            <label>ID (Driver License or SSN)</label>--}}
{{--                            <input type="text" value="{{ old("ss_dl") }}" name="ss_dl">--}}
{{--                        </div>--}}
{{--                        <div class="quest__form-title">Where do you live?</div>--}}
{{--                        <div class="form-group large">--}}
{{--                            <label>Address Street</label>--}}
{{--                            <input type="text" value="{{ old("address") }}" name="address">--}}
{{--                        </div>--}}
{{--                        <div class="form-group min">--}}
{{--                            <label>City</label>--}}
{{--                            <input type="text" value="{{ old("city") }}" name="city">--}}
{{--                        </div>--}}
{{--                        <div class="form-group min">--}}
{{--                            <label>State</label>--}}
{{--                            <select class="small" name="state" id="regions">--}}
{{--                                @foreach($regions[1] as $region)--}}
{{--                                    <option @if(old("state") == $region->name) selected @endif value="{{ $region->name }}">{{ $region->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="form-group min">--}}
{{--                            <label>Zip Code</label>--}}
{{--                            <input type="text" value="{{old("zip")}}" name="zip">--}}
{{--                        </div>--}}
{{--                        <div class="form-group min">--}}
{{--                            <label>Country</label>--}}
{{--                            <select name="country" class="small" id="countries">--}}
{{--                                @foreach($countries as $country)--}}
{{--                                    <option @if(old("country") == $country->id) selected @endif value="{{ $country->id }}">{{ $country->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <div class="quest__form-btn">
                            <button class="btn" type="submit">Сontinue</button>
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
    </div>
@endsection
