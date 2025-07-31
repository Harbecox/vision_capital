@extends("layouts.app")

@section("content")

    <section class="hat min">
        <div class="hat__bg">
            <img src="/img/cap5.jpg" alt="">
        </div>
        <div class="row min pos">
            <h1 class="hat__title">Deposits</h1>
            <livewire:client.deposite></livewire:client.deposite>
        </div>
    </section>
    <section class="content bg">
        <div class="row min">
            <div class="box">
                <div class="table deposit_table">
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th style="width: 15%;">Status</th>
                        </tr>
                        @foreach($deposites as $deposit)
                            <tr>
                                <td>
                                @if($deposit->payed_at)
                                        $deposit->payed_at
                                    @else
                                    {{ $deposit->updated_at }}
                                    @endif
                                </td>
                                <td>@if($deposit['type'] == \App\Models\Deposit::TYPE_CHECK) Check @elseif($deposit['type'] == \App\Models\Deposit::TYPE_DIVIDEND) Dividend @else Wire Transfer @endif</td>
                                <td><b style="color:#193772;">+@cur_format($deposit['sum'])</b></td>
                                <td><div class="badge" @if($deposit->status == 'pending') style="background: #FFB330;" @elseif($deposit->status == "payed") style="background: #25C150;" @else style="background: #F44338;" @endif >@if($deposit->status == "payed") Completed @else {{ $deposit->status }} @endif</div></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                {{$deposites->links()}}
            </div>
        </div>
    </section>

    <script>
        window.addEventListener("refresh_deposit_list",function (){
            fetch(location.href) .then((response) => {
                return response.text()
            })
                .then((data) => {
                    const tempElement = document.createElement('div');
                    tempElement.innerHTML = data;
                    document.querySelector(".deposit_table").innerHTML = tempElement.querySelector(".deposit_table").innerHTML;
                });
        });
    </script>

@endsection
