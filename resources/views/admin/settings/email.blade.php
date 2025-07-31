@extends("layouts.settings")

@section("content_s")
    <form action="{{route('admin.settings.email.update')}}" method="post">
        @csrf
        @method('PUT')
        <div class="card mb-3">
            <div class="card-header">
                Register success html code
            </div>
            <div class="card-body">
                <textarea name="html" class="form-control">{!! $html !!}</textarea>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <label for="admin_email">Admin Email To Get Contact Messages</label>

                <input type="text" name="admin_email" value="{{ $admin_email }}" id="admin_email">
            </div>
        </div>
        @foreach($emails as $email)
            <div class="card mb-3">
                <div class="card-header">
                    {{ $email['name'] }}
                </div>
                <div class="card-body">
                    <textarea name="content[{{ $email['name'] }}]" class="editor">{!! $email['content'] !!}</textarea>
                </div>
            </div>
        @endforeach
        <div class="mt-2 d-flex justify-content-end">
            <button class="btn btn-primary">Save</button>
        </div>

    </form>

@endsection
