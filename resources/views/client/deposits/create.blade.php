@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 offset-lg-2">
                <div class="card">
                    <div class="card-header">New Deposite</div>
                    <div class="card-body">
                        <livewire:client.deposite />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
