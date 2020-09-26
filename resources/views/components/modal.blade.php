<div class="modal" id="modal-{{ $name ?? rand(00000, 99999) }}" :class="{ 'active': modal == '{{ $state }}' }">
  <a href="#" @click="modal = null; Livewire.emit('closeModal')" class="modal-overlay" aria-label="Close"></a>
  <div class="modal-container">
    @if($header)
    <div class="modal-header">
      <a href="#" @click="modal = null; Livewire.emit('closeModal')" class="btn btn-clear float-right" aria-label="Close"></a>
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