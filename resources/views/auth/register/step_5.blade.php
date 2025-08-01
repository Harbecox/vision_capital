@extends('layouts.register')

@section("prc")100% @endsection

@section('step')

    <div class="quest__item active">
        <div class="quest__success">
            <div class="quest__success-block">
                <div class="quest__success-logo"><img src="/img/logo.svg" alt=""></div>
                <div class="quest__success-text">
                    <p>Thank you for submitting your application for an account with us. A representative will
                        be in contact with you within the next 24 hours to discuss the next steps and answer any
                        questions you may have.</p>
                </div>
                <div class="quest__success-btn"><a href="/" class="btn">Сontinue</a></div>
            </div>
        </div>

        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                event: 'purchase',
                user_data: {
                    first_name: "{{ $user_data['info'][0]['first_name'] }}",
                    last_name: "{{ $user_data['info'][0]['last_name'] }}",
                    phone_no: "{{ $user_data['info'][0]['phone'] }}",
                    email: "{{ $user_data['info'][0]['email'] }}",
                    address: "{{ $user_data['info'][0]['address'] }}",
                    city: "{{ $user_data['info'][0]['city'] }}",
                    postal_code: "{{ $user_data['info'][0]['zip'] }}",
                    country: "{{ App\Models\Country::query()->where("id", $user_data['info'][0]['country'])->first()->name }}",
                }
            });
        </script>

    </div>
@endsection
