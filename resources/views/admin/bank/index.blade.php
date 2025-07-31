@extends("layouts.admin")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><div class="d-flex justify-content-between align-items-center">Banks<a href="{{ route("admin.bank.create") }}" class="btn btn-primary">New Bank account</a></div></div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Profile name</th>
                                <th>Bank Name</th>
                                <th>Bank Address</th>
                                <th>Beneficiary Name</th>
                                <th>Account Number</th>
                                <th>Routing/ABA</th>
                                <th>SWIFT</th>
                            </tr>
                            </thead>
                            @foreach($banks as $bank)
                                <tr>
                                    <td><a href="{{ route("admin.bank.edit",$bank->id) }}" class="btn btn-secondary">{{ $bank->profile }}</a></td>
                                    <td>{{ $bank->name }}</td>
                                    <td>{{ $bank->address }}</td>
                                    <td>{{ $bank->beneficiary }}</td>
                                    <td>{{ $bank->account }}</td>
                                    <td>{{ $bank->r_aba }}</td>
                                    <td>{{ $bank->swift }}</td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header"><div class="d-flex justify-content-between align-items-center">Check info</div></div>
                    <div class="card-body">
                        <form method="post" action="{{route('admin.bank.check')}}">
                            @csrf
                            @foreach($check as $name => $value)
                                <x-form.input :name="$name" :label="$name" type="text" :value="$value"></x-form.input>
                            @endforeach
                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
