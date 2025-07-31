@extends("layouts.admin")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">New Bank account</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("admin.bank.store") }}" method="POST">
                            <div class="row">
                                <div class="col-6">
                                    @csrf
                                    <x-form.input col="12" name="profile"       label="Profile Name"        type="text" value="{{ $bank['profile'] }}"></x-form.input>
                                    <x-form.input col="12" name="name"          label="Bank Name"           type="text" value="{{ $bank['name'] }}"></x-form.input>
                                    <x-form.input col="12" name="address"       label="Bank Address"        type="text" value="{{ $bank['address'] }}"></x-form.input>
                                    <x-form.input col="12" name="beneficiary"   label="Beneficiary Name"    type="text" value="{{ $bank['beneficiary'] }}"></x-form.input>
                                    <x-form.input col="12" name="account"       label="Account Number"      type="text" value="{{ $bank['account'] }}"></x-form.input>
                                    <x-form.input col="12" name="r_aba"         label="Routing/ABA"         type="text" value="{{ $bank['r_aba'] }}"></x-form.input>
                                    <x-form.input col="12" name="swift"         label="SWIFT"               type="text" value="{{ $bank['swift'] }}"></x-form.input>
                                    <button class="btn btn-primary">Save</button>
                                </div>
                                <div class="col-6">
                                    <livewire:admin.bank-add-user :bank_id="$bank->id"></livewire:admin.bank-add-user>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
