<div class="col-md-{{ $col }} col-12 offset-md-{{ (12 - $col)/2 }} mb-3">
    <label for="#input_{{ $name }}" class="form-label">{{ __($label) }}</label>
    <input wire:model="{{ $name }}" id="input_{{ $name }}" type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" value="{{ strlen($value) ? $value : old($name) }}" @if($required) required @endif>
    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
