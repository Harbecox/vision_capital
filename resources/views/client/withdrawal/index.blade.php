@extends("layouts.app")

@section("content")
    <section class="hat min">
        <div class="hat__bg">
            <img src="/img/cap5.jpg" alt="">
        </div>
        <div class="row min pos">
            <h1 class="hat__title">Withdrawals</h1>
            <livewire:client.withdrawal></livewire:client.withdrawal>
            <div class="hat__price">
                <p>Your available balance is:</p>
                <b>@cur_format($balance->available())</b>
            </div>

        </div>
    </section>
    <section class="content bg">
        <div class="row min">
            <div class="box">
                <div class="table">
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th style="width: 15%;">Status</th>
                        </tr>
                        @foreach($withdrawals as $withdrawal)
                        <tr>
                            <td>{{ $withdrawal->payed_at ?? $withdrawal->updated_at }}</td>
                            <td>@if($withdrawal['type'] == \App\Models\Withdrawal::TYPE_CHECK) Check @else Wire Transfer @endif</td>
                            <td><b style="color:#193772;">-@cur_format($withdrawal['sum'])</b></td>
                            <td><div class="badge" @if($withdrawal->status == 'pending') style="background: #FFB330;" @elseif($withdrawal->status == "payed") style="background: #25C150;" @else style="background: #F44338;" @endif >{{$withdrawal->status}}</div></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
               {{$withdrawals->links()}}
            </div>
        </div>
    </section>
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header"><div class="d-flex justify-content-between align-items-center">Withdrawals<a href="{{ route("dashboard.withdrawals.create") }}" class="btn btn-primary">New Withdrawal</a></div></div>--}}
{{--                    <div class="card-body">--}}
{{--                        <table class="table">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Type</th>--}}
{{--                                <th>Payee Name</th>--}}
{{--                                <th>Street address</th>--}}
{{--                                <th>City</th>--}}
{{--                                <th>State</th>--}}
{{--                                <th>Zip Code</th>--}}
{{--                                <th>Country</th>--}}
{{--                                <th>Bank name</th>--}}
{{--                                <th>bank address</th>--}}
{{--                                <th>bank account</th>--}}
{{--                                <th>bank ABA/Routing</th>--}}
{{--                                <th>Amount</th>--}}
{{--                                <th>Fee</th>--}}
{{--                                <th>Date</th>--}}
{{--                                <th>Status</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            @foreach($withdrawals as $withdrawal)--}}
{{--                                <tr class="@if($withdrawal['status'] == \App\Models\Withdrawal::STATUS_CANCEL) bg-secondary @elseif($withdrawal['status'] == \App\Models\Withdrawal::STATUS_PAYED) bg-success @endif">--}}
{{--                                    <td>@if($withdrawal['type'] == \App\Models\Withdrawal::TYPE_CHECK) Check @else Wire Transfer @endif</td>--}}
{{--                                    <td>{{ $withdrawal['payee_name'] }}</td>--}}
{{--                                    <td>{{ $withdrawal['address'] }}</td>--}}
{{--                                    <td>{{ $withdrawal['city'] }}</td>--}}
{{--                                    <td>{{ $withdrawal['state'] }}</td>--}}
{{--                                    <td>{{ $withdrawal['zip'] }}</td>--}}
{{--                                    <td>{{ $withdrawal['country'] }}</td>--}}
{{--                                    <td>{{ $withdrawal['bank_name'] }}</td>--}}
{{--                                    <td>{{ $withdrawal['bank_address'] }}</td>--}}
{{--                                    <td>{{ $withdrawal['bank_account'] }}</td>--}}
{{--                                    <td>{{ $withdrawal['bank_aba'] }}</td>--}}
{{--                                    <td>@cur_format($withdrawal['sum'])</td>--}}
{{--                                    <td>@cur_format($withdrawal['fee'])</td>--}}
{{--                                    <td class="text-nowrap">{{ $withdrawal->payed_at ?? $withdrawal->updated_at }}</td>--}}
{{--                                    <td class="text-nowrap">{{ $withdrawal['status'] }}</td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                        </table>--}}
{{--                        {{ $withdrawals->links() }}--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
