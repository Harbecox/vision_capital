@extends("layouts.settings")

@section("content_s")

    <div class="card">
        <div class="card-header">
            Fees
        </div>
        <div class="row">
            <div class="col-lg-8 col-12 offset-lg-2">
                <form action="{{ route("admin.settings.fee.update") }}" method="POST" class="card-body">
                    @csrf
                    @method("put")
                    @foreach($fees as $fee)

                        <div class="row">
                            <div class="col-5">
                                <x-form.input value="{{ $fee->min }}" name="min[{{ $fee->id }}]" col="12"
                                              label="From"></x-form.input>
                            </div>
                            <div class="col-5">
                                <x-form.input value="{{ $fee->max }}" name="max[{{ $fee->id }}]" col="12"
                                              label="To"></x-form.input>
                            </div>
                            <div class="col-2">
                                <x-form.input value="{{ $fee->prc }}" name="prc[{{ $fee->id }}]" col="12"
                                              label="Prc"></x-form.input>
                            </div>
                        </div>

                    @endforeach
                    <div class="mt-2 d-flex justify-content-end">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
