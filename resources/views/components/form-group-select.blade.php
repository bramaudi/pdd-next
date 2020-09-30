@if($horizontal)

<div class="form-group @error($error) has-error @enderror">
    <div class="col-3 col-sm-12">
        <label class="form-label" for="input-{{ $model }}">{{ $slot }}</label>
    </div>
    <div class="col-9 col-sm-12">
        <select wire:change="$set('{{ $model }}', $event.target.value)" class="form-select" id="input-{{ $model }}">
            @if($selected)
            <option value="{{ $selected['value'] }}">{{ $selected['name'] }}</option>
            @endif
            <option value="">--</option>
            @foreach($options as $option)
                <option value="{{ $option['value'] }}">{{ $option['name'] }}</option>
            @endforeach
        </select>
        @error($error) <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>
</div>

@else

<div class="form-group @error($error) has-error @enderror">
    <label class="form-label" for="input-{{ $model }}">{{ $slot }}</label>
    <select wire:change="$set('{{ $model }}', $event.target.value)" class="form-select" id="input-{{ $model }}">
        @if($selected)
        <option value="{{ $selected['value'] }}">{{ $selected['name'] }}</option>
        @endif
        <option value="">--</option>
        @foreach($options as $option)
            <option value="{{ $option['value'] }}">{{ $option['name'] }}</option>
        @endforeach
    </select>
    @error($error) <div class="form-input-hint">{{ $message }}</div> @enderror
</div>

@endif