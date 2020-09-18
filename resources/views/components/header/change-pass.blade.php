<form class="p-1" wire:submit.prevent="submitGantiSandi" x-show="gantiSandi">
    <div class="form-group @error('changePassOld') has-error @enderror">
        <label for="header-ganti-sandi-old" class="form-label">Kata Sandi Lama:</label>
        <input type="password" id="header-ganti-sandi-old" class="form-input" wire:model="changePassOld">
        @error('changePassOld') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>
    <div class="form-group @error('changePassNew') has-error @enderror">
        <label for="header-ganti-sandi-new" class="form-label">Kata Sandi Baru:</label>
        <input type="password" id="header-ganti-sandi-new" class="form-input" wire:model="changePassNew">
        @error('changePassNew') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>
    <div class="form-group @error('changePassNew2') has-error @enderror">
        <label for="header-ganti-sandi-new2" class="form-label">Ulangi Kata Sandi Baru:</label>
        <input type="password" id="header-ganti-sandi-new2" class="form-input" wire:model="changePassNew2">
        @error('changePassNew2') <div class="form-input-hint">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="submitGantiSandi">Perbarui</button>
        <progress class="progress" max="100" wire:loading wire:target="submitGantiSandi"></progress>
    </div>
    @if(session()->has('success')) <div class="toast toast-success">{{ session('success') }}</div> @endif
    @if(session()->has('failed')) <div class="toast toast-error">{{ session('failed') }}</div> @endif
</form>
