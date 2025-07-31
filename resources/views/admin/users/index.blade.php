@extends("layouts.admin")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">Accounts</div>
                </div>
                <div class="card-body">
                    <form action="{{ route("admin.users.index") }}" method="GET" class="d-flex gap-3 my-2">
                        <input class="form-control" name="name" placeholder="First name/Last name"
                               value="{{ request()->get("name","") }}">
                        <input class="form-control" name="account" placeholder="Account #"
                               value="{{ request()->get("account","") }}">
                        <button class="btn btn-primary">Search</button>
                    </form>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>First Name/Last Name</th>
                            <th>Account #</th>
                            <th>Balance</th>
                            <th width="200">Deposit Type</th>
                            <th>Last Login</th>
                            <th>IP</th>
                            <th>State</th>
                            <th>Dividends compound</th>
                        </tr>
                        </thead>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#info_modal_{{ $user->id }}">
                                        @foreach($user->info as $info)
                                            <p class="m-0">{{ $info->first_name }} {{ $info->last_name }}</p>
                                        @endforeach
                                    </button>
                                    <div class="modal fade" id="info_modal_{{ $user->id }}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-4"
                                                        id="exampleModalLgLabel">{{ $user->first_name }} {{ $user->last_name }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table">
                                                        <tr>
                                                            <td>Account Type</td>
                                                            <td colspan="2">{{ $user->type }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Username</td>
                                                            <td colspan="2">{{ $user->username }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Account</td>
                                                            <td colspan="2">{{ $user->account }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ip Address</td>
                                                            @if($user->log)
                                                            <td colspan="2" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">{{ $user->log->ip }}</td>
                                                                @endif
                                                        </tr>
                                                        <tr>
                                                            <td>Dividend Compound </td>
                                                            <td colspan="2">{{ $user->div_comp ? "On" : "Off"}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Register Date</td>
                                                            <td colspan="2">{{ $user->created_at }}</td>
                                                        </tr>


                                                        @if($user->type == "Joint")
                                                            <tr>
                                                                <td></td>
                                                                <td><b>Holder 1</b></td>
                                                                <td><b>Holder 2</b></td>
                                                            </tr>
                                                        @endif
                                                        <tr>
                                                            <td>First Name</td>
                                                            @foreach($user->info as $info)
                                                                <td>{{ $info->first_name }}</td>
                                                            @endforeach
                                                        </tr>
                                                        <tr>
                                                            <td>Middle Name</td>
                                                            @foreach($user->info as $info)
                                                                <td>{{ $info->middle_name }}</td>
                                                            @endforeach
                                                        </tr>
                                                        <tr>
                                                            <td>Last Name</td>
                                                            @foreach($user->info as $info)
                                                                <td>{{ $info->last_name }}</td>
                                                            @endforeach
                                                        </tr>
                                                        <tr>
                                                            <td>Date of Birth</td>
                                                            @foreach($user->info as $info)
                                                                <td>{{ $info->birth_day }}</td>
                                                            @endforeach
                                                        </tr>
                                                        <tr>
                                                            <td>Social Security or Driver License</td>
                                                            @foreach($user->info as $info)
                                                                <td>{{ $info->ss_dl }}</td>
                                                            @endforeach
                                                        </tr>
                                                        <tr>
                                                            <td>Address Street</td>
                                                            @foreach($user->info as $info)
                                                                <td>{{ $info->address }}</td>
                                                            @endforeach
                                                        </tr>
                                                        <tr>
                                                            <td>City</td>
                                                            @foreach($user->info as $info)
                                                                <td>{{ $info->city }}</td>
                                                            @endforeach
                                                        </tr>
                                                        <tr>
                                                            <td>State</td>
                                                            @foreach($user->info as $info)
                                                                <td>{{ $info->state }}</td>
                                                            @endforeach
                                                        </tr>
                                                        <tr>
                                                            <td>Country</td>
                                                            @foreach($user->info as $info)
                                                                <td>{{ $info->country }}</td>
                                                            @endforeach
                                                        </tr>
                                                        <tr>
                                                            <td>Phone Number</td>
                                                            @foreach($user->info as $info)
                                                                <td>{{ $info->phone }}</td>
                                                            @endforeach
                                                        </tr>
                                                        <tr>
                                                            <td>Email Address</td>
                                                            @foreach($user->info as $info)
                                                                <td>{{ $info->email }}</td>
                                                            @endforeach
                                                        </tr>





                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#transaction_modal_{{ $user->id }}">{{ $user->account }}</button>
                                    <div class="modal fade" id="transaction_modal_{{ $user->id }}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-4"
                                                        id="exampleModalLgLabel">{{ $user->account }} Transactions</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Type</th>
                                                            <th>Amount</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                        </thead>
                                                        @foreach($user->transfers()->orderByDesc("created_at")->withTrashed()->get() as $transfer)
                                                            <tr @if($transfer->trashed()) style="opacity: 0.6;" @endif>
                                                                <td>{{ $transfer->created_at }}</td>
                                                                <td>{{ $transfer->name }}</td>
                                                                <td>@if($transfer->type == \App\Models\Transfer::TYPE_WITHDRAWAL)-@else+@endif @cur_format($transfer->sum)
                                                                    @if($transfer->fee > 0) ( -@cur_format($transfer->fee) fee )@endif
                                                                </td>
                                                                <td>
                                                                    @if($transfer->trashed())
                                                                        Deleted
                                                                    @else
                                                                    <a href="{{ route("admin.users.delete_transaction",$transfer->id) }}" onclick="return confirm('Delete transaction ???')" class="btn btn-danger">Delete</a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>@cur_format($user->balance->total())<br>@cur_format($user->balance->available())</td>
                                <td>
                                    <form class="user_save_form" action="{{ route("admin.users.save",$user->id) }}" method="POST">
                                        @csrf
                                        <div class="d-flex gap-1">
                                            <input name="bank" @if($user->bank) checked
                                                   @endif type="checkbox">
                                            <select name="bank_id" style="min-height: auto"
                                                    class="p-1 form-control form-select">
                                                <option disabled selected>Bank account</option>
                                                @foreach($banks as $bank)
                                                    <option value="{{ $bank->id }}"
                                                            @if($user->bank_id && $user->bank_id == $bank->id) selected @endif>{{ $bank->profile }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div><input name="check" value="1" @if($user->check) checked
                                                    @endif type="checkbox"> Check
                                        </div>
                                    </form>
                                </td>
                                <td>{{ $user->log->created_at ?? "" }}</td>
                                <td>
                                    @if($user->log)
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $user->log->referrer }}">
                                    @endif
                                    {{ $user->log->ip ?? "" }}
                                    @if($user->log && $user->log->user_agent)
                                        @php
                                            $d = (new \Karmendra\LaravelAgentDetector\AgentDetector($user->log->user_agent))->device()
                                        @endphp
                                        @if($d == "smartphone" || $d == "mobile" || $d == "tablet")
                                            <img src="/img/cell-phone.png" width="20px">
                                        @elseif($d == "desktop")
                                            <img src="/img/computer.png" width="20px">
                                        @endif

                                    @endif
                                    </span>
                                </td>
                                <td>@if($user->approved) Approved @else
                                    <a style="display: inline-block;" href="{{ route("admin.users.approve",$user->id) }}">
                                        <svg class="check_svg" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 254000 254000" style="enable-background:new 0 0 512 512" xml:space="preserve" fill-rule="evenodd"><g><g fill="#48b02c"><path d="m96229 162644 89510-89509c2637-2638 6967-2611 9578 0l8642 8642c2611 2611 2611 6968 0 9578l-89509 89510c-2611 2611-6941 2638-9579 0l-8642-8642c-2638-2638-2638-6941 0-9579z" fill="#48b02c" opacity="1" data-original="#48b02c" class=""></path><path d="m68270 108089 54525 54525c2637 2638 2606 6973 0 9579l-8642 8642c-2606 2605-6973 2605-9579 0l-54525-54525c-2606-2606-2637-6941 0-9579l8642-8642c2638-2637 6941-2637 9579 0z" fill="#48b02c" opacity="1" data-original="#48b02c" class=""></path></g></g></svg>
                                    </a>&nbsp;|&nbsp;&nbsp;<a class="btn-close" href="{{ route("admin.users.delete",$user->id) }}"></a>
                                    @endif</td>
                                <td>
                                    <form class="user_save_form" action="{{ route("admin.users.save_dc",$user->id) }}" method="POST">
                                        @csrf
                                    <div class="form-check form-switch">

                                        <input class="form-check-input" type="checkbox" name="div_comp" @if(!$is_x_date) disabled @endif @if($user->div_comp) checked @endif>

                                    </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="user_save_toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header d-flex justify-content-end">
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <h6 class="text-success">User Data saved</h6>
            </div>
        </div>
    </div>

@endsection
