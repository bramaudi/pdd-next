<div class="form-group @error($name) has-error @enderror"">
    <label class="form-label" for="inp-{{ $randomId }}-{{ $name }}">{{ $label }}</label>
    <input class="form-input" type="{{ $type }}" id="inp-{{ $randomId }}-{{ $name }}" wire:model="{{ $name }}" placeholder="{{ $label }}">
    @error($name) <div class="form-input-hint">{{ $message }}</div> @enderror
</div>