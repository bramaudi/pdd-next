<div x-data>
    <div class="modal" :class="{ 'active': $wire.state }">
        <span tabindex="0" wire:click="$set('modal.add', false)" class="modal-overlay" aria-label="Close"></span>
        <div class="modal-container">
            
            @if($header)
            <div class="modal-header">
                <span tabindex="0" wire:click="$set('modal.add', false)" class="btn btn-clear float-right" aria-label="Close"></span>
                <div class="modal-title h5">{{ $header }}</div>
            </div>
            @endif

            <div class="modal-body">
            <div class="content">
                {{ $slot }}
            </div>
            </div>

            @if($footer)
            <div class="modal-footer">
                {{ $footer }}
            </div>
            @endif
        </div>
    </div>
</div>