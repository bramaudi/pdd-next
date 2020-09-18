<div class="form-group @error($name) has-error @enderror">
    <label class="form-label" for="inp-{{ time() }}-{{ $name }}">{{ $label }}</label>
    <input class="form-input" type="{{ $type }}" id="inp-{{ time() }}-{{ $name }}" wire:model="{{ $name }}" placeholder="{{ $label }}">
    @error($name) <div class="form-input-hint">{{ $message }}</div> @enderror
</div>