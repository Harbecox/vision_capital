@extends('layouts.app')
@section('header_script') {!! \App\Helper\Settings::get("register_success_html") !!} @endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registration Successful!</div>

                    <div class="card-body">
                        <div>
                            <p>
                                Thank you for registering with our platform. An email has been sent to the address you provided.
                                Please check your email and click on the verification link to activate your account.
                            </p>

                            <p>
                                If you haven't received the email within a few minutes, please check your spam folder.
                                If you encounter any issues, please contact our support team.
                            </p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
