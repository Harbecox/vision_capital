<div class="row min">
    <div class="box">
        <div class="box__title">
            <div class="box__title-name">Transfers</div>
            <form class="box__title-search" wire:submit="search">
                <button></button>
                <input wire:model="date_" type="date" id="transfer_date_input" name="search" placeholder="Transaction date">
            </form>
        </div>
        <div class="table">
            <table>
                <tr>
                    <th style="width: 60px;text-align: center;">#</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Amount</th>
                </tr>
                @foreach($transfers as $transfer)
                    <tr>
                        <td>{{$transfer->id}}</td>
                        <td>{{ $transfer->created_at }}</td>
                        <td style="text-align: center;">
                            <span style="color: #466BF0;">
                            @if($transfer->name == \App\Models\Transfer::NAME_CHECK) Check
                                @elseif($transfer->name == \App\Models\Transfer::NAME_DIVIDEND) Dividend
                                @elseif($transfer->name == \App\Models\Transfer::NAME_DIVIDEND_FEE) Performance Fee
                                @elseif($transfer->name == \App\Models\Transfer::NAME_FEE) Wire Transfer Fee
                                @elseif($transfer->name == \App\Models\Transfer::NAME_WIRE_TRANSFER) Wire Transfer
                            @endif
                            </span>
                        </td>
                        <td>
                            <b style="color:#193772;">@if($transfer->type == \App\Models\Transfer::TYPE_WITHDRAWAL)-@else+@endif@cur_format($transfer->sum)</b>
                        </td>
                    </tr>
                    @if($transfer->fee > 0)
                        <tr>
                            <td>{{$transfer->id}}</td>
                            <td>{{ $transfer->created_at }}</td>
                            <td style="text-align: center;">
                                @if($transfer->type == \App\Models\Transfer::TYPE_WITHDRAWAL)
                                    <span style="color: #466BF0;">Wire Transfer Fee</span>
                                @else
                                    <span style="color: #466BF0;">Performance Fee</span>
                                @endif
                            </td>
                            <td>
                                <b style="color:#193772;">-@cur_format($transfer->fee)</b>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>

        </div>
        {{ $transfers->links() }}
    </div>

</div>
