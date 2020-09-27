@if($horizontal)

<div class="form-group @error($model) has-error @enderror">
    <div class="col-3 col-sm-12">
        <label class="form-label" for="input-{{ $model }}">{{ $slot }}</label>
    </div>
    <div class="col-9 col-sm-12">
        <input class="form-input" wire:model="{{ $model }}" type="{{ $type }}">
        @error($model) <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>
</div>

@else

<div class="form-group @error($model) has-error @enderror">
    <label class="form-label" for="input-{{ $model }}">{{ $slot }}</label>
    <input class="form-input" wire:model="{{ $model }}" type="{{ $type }}">
    @error($model) <div class="form-input-hint">{{ $message }}</div> @enderror
</div>

@endif