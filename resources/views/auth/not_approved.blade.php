@extends('layouts.app')

@section("content")
 <div class="not_approved">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header">Registration Pending Approval!</h1>
                    <div class="card-body">
                        <div>
                            <p>
                                Thank you for registering with our platform. Your account is currently pending approval
                                from the admin. Please wait patiently for the approval process to be completed.
                            </p>

                            <p>
                                You will receive an email notification once your account is approved. If you have any
                                questions or concerns, please feel free to contact our support team.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>

@endsection
