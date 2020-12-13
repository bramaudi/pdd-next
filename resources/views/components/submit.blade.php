<button wire:target="submit" wire:loading.class="loading" class="btn" @if($disabled) disabled @endif>
    {{ $text }}
</button>

@if(session()->has('success')) <div class="notif--success">{{ session('success') }}</div> @endif
@if(session()->has('failed')) <div class="notif--error">{{ session('failed') }}</div> @endif
