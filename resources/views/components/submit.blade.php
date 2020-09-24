<button wire:target="submit" wire:loading.class="loading" class="btn btn-primary">
    {{ $text }}
</button>

@if(session()->has('success')) <div class="toast toast-success mt-2">{{ session('success') }}</div> @endif
@if(session()->has('failed')) <div class="toast toast-error mt-2">{{ session('failed') }}</div> @endif
