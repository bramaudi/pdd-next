<div class="form-group @error($name) has-error @enderror">
    <label class="form-label" for="inp-{{ md5($name) }}-{{ $name }}">{{ $label }}</label>
    <input class="form-input" type="{{ $type }}" id="inp-{{ md5($name) }}-{{ $name }}" wire:model="{{ $name }}" placeholder="{{ $label }}">
    @error($name) <div class="form-input-hint">{{ $message }}</div> @enderror
</div>