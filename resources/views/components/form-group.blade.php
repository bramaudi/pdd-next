<div class="mb-1">
    <label class="block font-semibold" for="input-{{ $model }}">{{ $slot }}</label>
    <input class="input w-full" wire:model.lazy="{{ $model }}" type="{{ $type }}" {{ $step }} {{ $disabled }}>
    @error($error) <div class="notif--error">{{ $message }}</div> @enderror
</div>