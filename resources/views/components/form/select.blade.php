<div class="col-md-{{ $col }} col-12 offset-md-{{ $offset }} mb-3">
    <label class="form-label" >{{ $label }}</label>
    <div class="d-flex gap-3">
        <select id="{{ $id }}" @if($required) required @endif wire:model="{{ $name }}" name="{{ $name }}" class="form-select {{ $classes }} @error($name) is-invalid @enderror" aria-label="Default select example">
            <option value="-1" selected>{{ $label }}</option>
            @foreach($options as $value => $text)
                <option @if(old($name) && old($name) == $value) selected @endif value="{{ $value }}">{{ $text }}</option>
            @endforeach
        </select>
    </div>
    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
