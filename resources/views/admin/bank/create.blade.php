@extends("layouts.admin")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><div class="d-flex justify-content-between align-items-center">New Bank account</div></div>
                    <div class="card-body">
                        <form action="{{ route("admin.bank.store") }}" method="POST">
                            @csrf
                            <x-form.input name="profile" label="Profile Name" type="text" ></x-form.input>
                            <x-form.input name="name" label="Bank Name" type="text" ></x-form.input>
                            <x-form.input name="address" label="Bank Address" type="text" ></x-form.input>
                            <x-form.input name="beneficiary" label="Beneficiary Name" type="text" ></x-form.input>
                            <x-form.input name="account" label="Account Number" type="text" ></x-form.input>
                            <x-form.input name="r_aba" label="Routing/ABA" type="text" ></x-form.input>
                            <x-form.input name="swift" label="SWIFT" type="text" ></x-form.input>
                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
