@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">New Withdrawal</div>
                    <div class="card-body">
                        <livewire:client.withdrawal />
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
