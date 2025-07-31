@extends("layouts.admin")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><div class="d-flex justify-content-between align-items-center">Withdrawals<a data-bs-toggle="modal" data-bs-target="#new_withdrawal_modal" class="btn btn-primary">New Withdrawal</a></div></div>

                    <div class="modal fade" id="new_withdrawal_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{route("admin.withdrawals.store")}}" method="post" class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    @csrf

                                    <x-form.select name="type" label="Select withdrawn method" :options="['wire_transfer' => 'Wire Transfer','check' => 'Check']"></x-form.select>
                                    <x-form.select classes="js-choice" name="user_id" value="" label="User" :options="$users"></x-form.select>
                                    <x-form.input name="sum" label="Amount to be withdrawn"></x-form.input>
                                    <x-form.input name="payee_name" label="Payee Name" type="text" ></x-form.input>
                                    <x-form.input name="address" label="Street address" type="text" ></x-form.input>
                                    <x-form.input name="city" label="City" type="text" ></x-form.input>
                                    <x-form.input name="state" label="State" type="text" ></x-form.input>
                                    <x-form.input name="zip" label="Zip Code" type="text" ></x-form.input>
                                    <x-form.input name="country" label="Country" type="text" ></x-form.input>
                                    <div class="bank_transfer @if(old("type") !=  \App\Models\Withdrawal::TYPE_WIRE_TRANSFER) d-none @endif">
                                        <x-form.input name="bank_name" label="Bank name" type="text" ></x-form.input>
                                        <x-form.input name="bank_address" label="bank address" type="text" ></x-form.input>
                                        <x-form.input name="bank_account" label="bank account" type="text" ></x-form.input>
                                        <x-form.input name="bank_aba" label="bank ABA/Routing" type="text" ></x-form.input>
                                    </div>
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
                                <th>Fee</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            @foreach($withdrawals as $withdrawal)
                                <tr>
                                    <td>
                                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#transaction_modal_{{ $withdrawal->id }}">{{ $withdrawal->user->info[0]->first_name." ".$withdrawal->user->info[0]->last_name }}</button>
                                        <div class="modal fade" id="transaction_modal_{{ $withdrawal->id }}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-4" id="exampleModalLgLabel">Withdrawal #{{ $withdrawal->id }}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table">
                                                            <thead>
                                                            <tr><th>Payee name</th><td>{{ $withdrawal->payee_name }}</td></tr>
                                                            <tr><th>Address</th><td>{{ $withdrawal->address }}</td></tr>
                                                            <tr><th>City</th><td>{{ $withdrawal->city }}</td></tr>
                                                            <tr><th>State</th><td>{{ $withdrawal->state }}</td></tr>
                                                            <tr><th>Country</th><td>{{ $withdrawal->country }}</td></tr>
                                                            <tr><th>Zip</th><td>{{ $withdrawal->zip }}</td></tr>
                                                            @if($withdrawal->type == \App\Models\Withdrawal::TYPE_WIRE_TRANSFER)
                                                                <tr><th>Bank name</th><td>{{ $withdrawal->bank_name }}</td></tr>
                                                                <tr><th>Bank address</th><td>{{ $withdrawal->bank_address }}</td></tr>
                                                                <tr><th>Bank account</th><td>{{ $withdrawal->bank_account }}</td></tr>
                                                                <tr><th>Routing/ABA</th><td>{{ $withdrawal->bank_aba }}</td></tr>
                                                            @endif
                                                            </thead>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $withdrawal->user->account }}</td>
                                    <td>@if($withdrawal['type'] == \App\Models\Withdrawal::TYPE_CHECK) Check @else Wire Transfer @endif</td>
                                    <td>@cur_format($withdrawal['sum'])</td>
                                    <td>@cur_format($withdrawal['fee'])</td>
                                    <td class="text-nowrap">{{ $withdrawal->payed_at }}</td>
                                    <td class="text-nowrap">
                                        <div class="d-flex gap-1">
                                             {{ $withdrawal['status'] }}
                                        @if($withdrawal->status == \App\Models\Withdrawal::STATUS_PENDING)
                                                <svg data-bs-toggle="modal" data-bs-target="#deposite_modal_{{ $withdrawal->id }}" class="check_svg" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 254000 254000" style="enable-background:new 0 0 512 512" xml:space="preserve" fill-rule="evenodd"><g><g fill="#48b02c"><path d="m96229 162644 89510-89509c2637-2638 6967-2611 9578 0l8642 8642c2611 2611 2611 6968 0 9578l-89509 89510c-2611 2611-6941 2638-9579 0l-8642-8642c-2638-2638-2638-6941 0-9579z" fill="#48b02c" opacity="1" data-original="#48b02c" class=""></path><path d="m68270 108089 54525 54525c2637 2638 2606 6973 0 9579l-8642 8642c-2606 2605-6973 2605-9579 0l-54525-54525c-2606-2606-2637-6941 0-9579l8642-8642c2638-2637 6941-2637 9579 0z" fill="#48b02c" opacity="1" data-original="#48b02c" class=""></path></g></g></svg>
                                        </div>
                                        <div class="modal fade" id="deposite_modal_{{ $withdrawal->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route("admin.withdrawals.update",$withdrawal->id) }}" method="POST" class="modal-content">
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
                                                        <button type="submit" class="btn btn-primary">Pay</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $withdrawals->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        let modal = document.getElementById("new_withdrawal_modal");
        modal.querySelector("select[name=type]").addEventListener("change",function (){
            if(this.value == "{{ \App\Models\Withdrawal::TYPE_WIRE_TRANSFER }}"){
                modal.querySelector(".bank_transfer").classList.remove("d-none");
            }else{
                modal.querySelector(".bank_transfer").classList.add("d-none");
            }
        })

    </script>
    @if($errors->any())
        <script>
            setTimeout(function (){
                window.dispatchEvent(new CustomEvent("show_withdrawal_modal"));
            },300);
        </script>
    @endif
    @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
@endsection
