<div class="mb-1">
    <label class="block font-semibold" for="input-{{ $model }}">{{ $slot }}</label>
    <select wire:change="$set('{{ $model }}', $event.target.value)" class="input w-full" id="input-{{ $model }}" {{ $disabled }}>
        @if($selected)
        <option value="{{ $selected['value'] }}">{{ $selected['name'] }}</option>
        @endif
        <option value="">--</option>
        @foreach($options as $option)
            <option value="{{ $option['value'] }}">{{ $option['name'] }}</option>
        @endforeach
    </select>
    @error($error) <div class="notif--error">{{ $message }}</div> @enderror
</div>