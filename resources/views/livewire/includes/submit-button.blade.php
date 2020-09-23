@if(session()->has('success'))
    <div class="divider"></div>
    <div class="toast toast-success">{{ session('success') }}</div>
    <div class="divider"></div>
@endif

@if(session()->has('failed'))
    <div class="divider"></div>
    <div class="toast toast-error">{{ session('failed') }}</div>
    <div class="divider"></div>
@endif

<div class="form-group">
    <button
        class="btn btn-primary"
        wire:target="submit"
        wire:loading.attr="disabled"
        wire:loading.class="loading"
    >
        {{ $text }}
    </button>
</div>