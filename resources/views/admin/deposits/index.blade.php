@extends("layouts.admin")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><div data-bs-toggle="modal" data-bs-target="#new_deposite_modal" class="d-flex justify-content-between align-items-center">Deposits<a  class="btn btn-primary">New deposit</a></div></div>
                    <div class="modal fade" id="new_deposite_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{route("admin.deposits.store")}}" method="post" class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                        @csrf
                                        <x-form.select name="type" value="" label="Type" :options="[\App\Models\Deposit::TYPE_WIRE_TRANSFER => \App\Models\Deposit::TYPE_WIRE_TRANSFER,\App\Models\Deposit::TYPE_CHECK => \App\Models\Deposit::TYPE_CHECK ]"></x-form.select>
                                        <x-form.select classes="js-choice" name="user_id" value="" label="User" :options="$users"></x-form.select>
                                        <x-form.input name="sum" value="" label="Amount" type="text" ></x-form.input>
                                        <x-form.input name="date" value="" label="Date" type="date" ></x-form.input>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>First Name/Last Name</th>
                                <th>Account #</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Days left</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            @foreach($deposits as $deposit)
                                <tr>
                                    <td>{{ $deposit->user->info[0]->first_name." ".$deposit->user->info[0]->last_name }}</td>
                                    <td>{{ $deposit->user->account }}</td>
                                    <td>@if($deposit['type'] == \App\Models\Deposit::TYPE_CHECK) Check @else Wire Transfer @endif</td>
                                    <td>@cur_format($deposit['sum'])</td>
                                    <td class="text-nowrap">
                                        {{ $deposit->payed_at }}
                                    </td>
                                    <td>@if($deposit->status == \App\Models\Deposit::STATUS_PAYED && $deposit->days_left) {{ $deposit->days_left }}
                                        <svg style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#deposit_edit_modal_{{ $deposit->id }}" xmlns="http://www.w3.org/2000/svg" class="feather feather-edit" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="16"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>

                                        <div class="modal" id="deposit_edit_modal_{{ $deposit->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <form action="{{ route("admin.deposits.update_payed_at",$deposit->id ) }}" method="POST" class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Deposite #{{ $deposit->id }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf
                                                        <input type="date" value="{{ $deposit->getAttributes()['payed_at'] }}" name="payed_at">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        @endif</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                        {{ $deposit->status }}

                                        @if($deposit->status == \App\Models\Deposit::STATUS_PENDING)
                                                <svg data-bs-toggle="modal" data-bs-target="#deposite_modal_{{ $deposit->id }}" class="check_svg" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 254000 254000" style="enable-background:new 0 0 512 512" xml:space="preserve" fill-rule="evenodd"><g><g fill="#48b02c"><path d="m96229 162644 89510-89509c2637-2638 6967-2611 9578 0l8642 8642c2611 2611 2611 6968 0 9578l-89509 89510c-2611 2611-6941 2638-9579 0l-8642-8642c-2638-2638-2638-6941 0-9579z" fill="#48b02c" opacity="1" data-original="#48b02c" class=""></path><path d="m68270 108089 54525 54525c2637 2638 2606 6973 0 9579l-8642 8642c-2606 2605-6973 2605-9579 0l-54525-54525c-2606-2606-2637-6941 0-9579l8642-8642c2638-2637 6941-2637 9579 0z" fill="#48b02c" opacity="1" data-original="#48b02c" class=""></path></g></g></svg> &nbsp;|&nbsp;&nbsp;<a style="width: 0px;height: 10px;" class="btn-close" href="{{ route("admin.deposits.deletedeposit",$deposit->id) }}"></a>
                                        </div>
                                        <div class="modal fade" id="deposite_modal_{{ $deposit->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route("admin.deposits.update",$deposit->id) }}" method="POST" class="modal-content">
                                                    @csrf
                                                    @method("PUT")
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Change deposit status</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input required value="{{ \Carbon\Carbon::now()->toDateString() }}" name="date" class="form-control" type="date">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Approve</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $deposits->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($errors->any())
        <script>
            setTimeout(function (){
                window.dispatchEvent(new CustomEvent("show_deposit_modal"));
            },300);
        </script>
    @endif
@endsection
