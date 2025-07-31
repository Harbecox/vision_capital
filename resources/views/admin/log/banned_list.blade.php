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
                            <form id="search_form" action="{{ route("admin.log.banned_list") }}" method="GET" class="d-flex gap-3 my-2">
                                <input class="form-control"  name="ip" placeholder="IP"
                                       value="{{ request()->get("ip","") }}">
                                <button class="btn btn-primary">Search</button>
                            </form>
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
                            <a class="btn btn-secondary ms-4" href="{{ route('admin.log.index') }}">Log List</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Ip</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        @foreach($list as $log)
                            <tr>

                                <td>
                                    {{ $log->ip }}
                                </td>

                                <td>{{ $log->created_at }}</td>
                                <td>
                                    <a onclick="return confirm('Are you sure to unban IP ?')" href="{{ route("admin.log.unban_from_ban_list",$log) }}" class="btn btn-success">Unbann</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $list->links() }}
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
