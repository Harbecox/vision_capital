@extends("layouts.admin")

@section("content")

    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                Interest<a class="btn btn-warning" href="{{ route("admin.interest.simulate") }}">Crediting dividends</a>
            </div>
            <div class="row">
                <div class="col-lg-8 col-12 offset-lg-2">
                    <form action="{{ route("admin.interest.update") }}" method="POST" class="card-body">
                        @csrf
                        @method("put")
                        <div class="row">
                            <x-form.input type="text" value="{{ $div }}" name="prc" col="12"
                                          label="{{ \Illuminate\Support\Carbon::now()->subMonth()->monthName }} dividends"></x-form.input>
                        </div>
                        <div class="mt-2 d-flex justify-content-end">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @foreach($users as $user)
            <div class="card mt-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>{{ $user->first_name }} {{ $user->last_name }} #{{ $user->account }}</div>
                        <div>Fee {{ $user['fee'] }}%</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-12 offset-lg-2">
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Amount</th>
                                    <th>Diviident</th>
                                    <th>Fee</th>
                                    <th>Date interval</th>
                                    <th>Days</th>
                                </tr>
                                @foreach($user->intervals as $interval)
                                    <tr>
                                        <td>{{ \App\Helper\Sum::toString($interval['amount']) }}</td>
                                        <td>{{ \App\Helper\Sum::toString($interval['div']) }}</td>
                                        <td>{{ \App\Helper\Sum::toString($interval['fee']) }}</td>
                                        <td>{{ $interval['interval'] }}</td>
                                        <td>{{ $interval['days'] }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th>Total:</th>
                                    <th>{{ \App\Helper\Sum::toString($user['total']['div']) }}</th>
                                    <th>{{ \App\Helper\Sum::toString($user['total']['fee']) }}</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
