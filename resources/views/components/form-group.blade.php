<div class="form-group @error($model) has-error @enderror">
    <label class="form-label" for="input-{{ $model }}">{{ $slot }}</label>
    <input class="form-input" wire:model="{{ $model }}" type="{{ $type }}">
    @error($model) <div class="form-input-hint">{{ $message }}</div> @enderror
</div>