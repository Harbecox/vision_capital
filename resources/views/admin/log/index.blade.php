@extends("layouts.admin")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">Logs</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <form id="search_form" action="{{ route("admin.log.index") }}" method="GET" class="d-flex gap-3 my-2">
                                <input class="form-control" name="name" placeholder="First name/Last name"
                                       value="{{ request()->get("name","") }}">
                                <input class="form-control" name="account" placeholder="Account #"
                                       value="{{ request()->get("account","") }}">
                                <input class="form-control" oninput="isValidIPv4()" name="ip" placeholder="IP"
                                       value="{{ request()->get("ip","") }}">
                                <button class="btn btn-primary">Search</button>
                            </form>
                            <script>
                                function isValidIPv4(ip) {
                                    const ipv4Pattern = /^(25[0-5]|2[0-4]\d|1\d{2}|\d{1,2})\.(25[0-5]|2[0-4]\d|1\d{2}|\d{1,2})\.(25[0-5]|2[0-4]\d|1\d{2}|\d{1,2})\.(25[0-5]|2[0-4]\d|1\d{2}|\d{1,2})$/;
                                    return ipv4Pattern.test(ip);
                                }
                                document.getElementById("search_form").addEventListener("submit", function (e){
                                    e.preventDefault();
                                    let inp = document.querySelector("input[name=ip]");
                                    if(isValidIPv4(inp.value) || inp.value.length === 0){
                                        this.submit()
                                    }
                                })
                            </script>
                        </div>
                        <div class="col-2  my-2">
                            <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">

                                    <form method="POST" action="{{route('admin.log.ban.ip')}}" class="modal-content">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Ban IP Address</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="ip_address" class="form-label">IP Address</label>
                                                <input type="text" class="form-control" id="ip_address" name="ip_address" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Ban IP</button>
                            <a class="btn btn-secondary ms-4" href="{{ route('admin.log.banned_list') }}">Banned List</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>First Name/Last Name</th>
                            <th>Account #</th>
                            <th>Ip</th>
                            <th>Url</th>
                            <th>Referrer</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        @foreach($logs as $log)
                            <tr>
                                <td>@if($log->user) {{ $log->user->first_name }} {{ $log->user->last_name }} @endif</td>
                                <td>@if($log->user) {{ $log->user->account }} @endif</td>
                                <td>{{ $log->ip }}
                                    @if($log->user_agent)
                                        @php
                                            $d = (new \Karmendra\LaravelAgentDetector\AgentDetector($log->user_agent))->device()
                                        @endphp
                                        @if($d == "smartphone" || $d == "mobile" || $d == "tablet")
                                            <img src="/img/cell-phone.png" width="20px">
                                        @elseif($d == "desktop")
                                            <img src="/img/computer.png" width="20px">
                                        @endif

                                    @endif
                                </td>
                                <td>{{ $log->url }}</td>
                                <td>
                                    {{ $log->referrer }}
                                </td>
                                <td>{{ $log->created_at }}</td>
                                @if(!\App\Helper\IP::isBanned($log->ip))
                                <td>
                                    <a onclick="return confirm('Are you sure to ban IP ?')" href="{{ route("admin.log.ban",$log) }}" class="btn btn-danger">Bann</a>
                                </td>
                                @else
                                    <td>
                                        <a onclick="return confirm('Are you sure to unban IP ?')" href="{{ route("admin.log.unban",$log) }}" class="btn btn-success">Unbann</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                    {{ $logs->links() }}
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
