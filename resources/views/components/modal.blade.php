<div :class="{ 'hidden': modal != '{{ $state }}' }" class="fixed flex justify-center items-center bg-gray-600 bg-opacity-40 top-0 left-0 right-0 h-screen">
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