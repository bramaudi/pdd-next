<div :class="{ 'flex': modal == '{{ $state }}' }" class="modal">
    <div @click.away="modal = null; Livewire.emit('modalClose')" class="card p-5 m-5">
        
        @if($header)
            <div class="text-xl mb-3 border-b">{{ $header }}</div>
        @endif

            {{ $slot }}

        @if($footer)
            <div class="mt-3">
                {{ $footer }}
            </div>
        @endif

    </div>
</div>