@extends("layouts.settings")

@section("content_s")
    <div class="card">
        <div class="card-header">
            Password
        </div>
        <div class="row">
            <div class="col-lg-8 col-12 offset-lg-2">
                <form action="{{ route("admin.settings.password.update") }}" method="POST" class="card-body">
                    @csrf
                    @method("put")
                    <x-form.input name="old_password" label="Old password"></x-form.input>
                    <x-form.input name="password" label="New password"></x-form.input>
                    <x-form.input name="password_confirmation" label="New password confirmation"></x-form.input>
                    @if(\Illuminate\Support\Facades\Session::has("success"))
                        <div class="col-8 offset-2">
                            <p class="text-success">{{ \Illuminate\Support\Facades\Session::get("success") }}</p>
                        </div>
                    @endif
                    <div class="mt-2 d-flex justify-content-end">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
