@extends('layouts.register')

@section("prc")100% @endsection

@section('step')
    <!--  ClickCease.com Conversion tracking-->
    <script type="text/javascript">
        ccConVal = 0;
        var script = document.createElement("script");
        script.async = true;
        script.type = "text/javascript";
        var target = 'https://www.clickcease.com/monitor/cccontrack.js';
        script.src = target; var elem = document.head; elem.appendChild(script);
    </script>
    <noscript>
        <a href="https://www.clickcease.com" rel="nofollow"><img src="https://monitor.clickcease.com/conversions/conversions.aspx?value=0" alt="ClickCease"/></a>
    </noscript>
    <!--  ClickCease.com Conversion tracking-->
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
