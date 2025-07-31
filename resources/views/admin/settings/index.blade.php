@extends("layouts.settings")

@section("content_s")

    <div class="card">
        <div class="card-header">
            X-date
        </div>
        <div class="row">
            <div class="col-lg-8 col-12 offset-lg-2">
                <form action="{{ route("admin.settings.index.update") }}" method="POST" class="card-body">
                    @csrf
                    @method("put")
                    <div class="row">
                        @foreach($dates as $k => $date)
                        <x-form.input type="date" value="{{ $date }}" name="date[{{ $k }}]" col="12"
                                      label="{{ $months[$k] }}"></x-form.input>
                        @endforeach
                    </div>
                    <div class="mt-2 d-flex justify-content-end">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
