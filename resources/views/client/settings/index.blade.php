@extends("layouts.app")

@section("content")
    <section class="content bg">
        <div class="row min">
            <div class="title">
                <div class="title__name">Settings</div>
            </div>
            <form class="box" action="{{ route("dashboard.settings.update") }}" method="POST">
                @csrf
                <div class="box__form min">
                    <div class="form-group large">
                        <label>Address Street</label>
                        <input type="text" value="{{ $settings->info[0]->address }}" name="address" required>
                    </div>
                    <div class="form-group large">
                        <label>State</label>
                        <input type="text" value="{{ $settings->info[0]->state}}" name="state" required>
                    </div>
                    <div class="form-group large">
                        <label>Zip Code</label>
                        <input type="text" value="{{ $settings->info[0]->zip}}" name="zip" required>
                    </div>
                    <div class="form-group large">
                        <label>Phone number</label>
                        <input type="text" value="{{ $settings->info[0]->phone}}" name="phone" required>
                    </div>
                    <div class="form-group large">
                        <label>Email</label>
                        <input type="text" value="{{ $settings->info[0]->email}}" name="email" required>
                    </div>
                    <div class="form-group large">
                        <label>Username</label>
                        <input type="text" value="{{ $settings->username}}" name="username" required>
                    </div>

                    <div class="box__form-btn">
                        <button class="btn" type="submit">Save</button>
                    </div>
                </div>
            </form>
            <form class="box" method="POST" action="{{route('dashboard.settings.password_update')}}">
                @csrf
                <div class="box__form min">
                    <div class="form-group large">
                        <label>Password</label>
                        <input type="password" name="password" required>
                        <i></i>
                        @error("password") <small>{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group large">
                        <label>New Password</label>
                        <input type="password"  name="new_password" required>
                        <i></i>
                        @error("new_password") <small>{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group large">
                        <label>Confirm Password</label>
                        <input type="password"  name="new_password_confirmation" required>
                        <i></i>
                    </div>
                    <button class="form-group large">
                        <div class="btn blue">Change Password</div>
                    </button>
                    @if(\Illuminate\Support\Facades\Session::get("success_password",false)) <div class="alert alert-success" role="alert" style="color:#0dd157;text-align: center;padding: 10px;">{{ \Illuminate\Support\Facades\Session::get("success_password",false) }}</div> @endif
                </div>
            </form>

        </div>
    </section>
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">Settings</div>--}}
{{--                    <div class="card-body">--}}
{{--                        <form action="{{ route("dashboard.settings.update") }}" method="POST">--}}
{{--                            @csrf--}}
{{--                            <div class="col-12 col-lg-8 offset-lg-2 mb-3">--}}
{{--                                <div class="form-check form-switch">--}}
{{--                                    <input class="form-check-input" name="div_comp" @if(!$is_x_date && $settings->div_comp) disabled @endif @if($settings->div_comp) checked @endif type="checkbox" id="flexSwitchCheckDefault">--}}
{{--                                    <label class="form-check-label" for="flexSwitchCheckDefault">Dividends compounded</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <x-form.input name="ss_dl" value="{{ $settings->ss_dl }}" label="Social Security or Driver License" type="text" ></x-form.input>--}}
{{--                            <x-form.input name="address" value="{{ $settings->address }}" label="Address Street" type="text" ></x-form.input>--}}
{{--                            <x-form.input name="city" value="{{ $settings->city }}" label="City" type="text" ></x-form.input>--}}
{{--                            <x-form.input name="state" value="{{ $settings->state }}" label="State" type="text" ></x-form.input>--}}
{{--                            <x-form.input name="country" value="{{ $settings->country }}" label="Country" type="text" ></x-form.input>--}}
{{--                            <x-form.input name="phone" value="{{ $settings->phone }}" label="Phone Number" type="text" ></x-form.input>--}}

{{--                            <div class="col-md-8 col-12 offset-md-2 my-3 d-flex justify-content-start">--}}
{{--                                <button type="submit" class="btn btn-primary me-2">--}}
{{--                                    {{ __('Save') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
