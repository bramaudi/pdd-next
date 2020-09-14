<header class="navbar" x-data="componentsHeader()">
  <section class="navbar-section">
    <a href="#sidebar" class="off-canvas-toggle btn btn-link btn-action">
        <i class="icon icon-menu"></i>
    </a>
    <a href="/" class="navbar-brand mx-2">PDD</a>
  </section>
  <section class="navbar-section">
        <div class="dropdown">
            @if(Auth::user())
            <div class="tile tile-centered dropdown-toggle" tabindex="0">
                <div class="tile-icon">
                    <img src="{{ $gravatar }}" alt="{{ Auth::user()->name }}" class="s-circle" style="width: 28px; float: left">
                </div>
                <div class="tile-content">{{ Auth::user()->name }}</div>
            </div>
            @else
                <div class="btn btn-primary btn-sm s-circle dropdown-toggle" tabindex="0">
                    <i class="icon icon-person"></i>
                </div>
            @endif
            
            <ul class="menu avatar-dropdown">
                @if(Auth::user())
                <li class="menu-item" x-show="gantiSandi">
                    <button @click="toggleGantiSandi()" type="button" class="btn btn-link text-left pl-0" style="width: 100%">
                        <i class="icon icon-back"></i>
                    </button>
                </li>
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
                @endif

                <li class="menu-item" x-show="menu">
                    @if(Auth::user())
                    <a href="#" @click="toggleGantiSandi"><i data-feather="unlock"></i> Ganti Kata Sandi</a>
                    <a href="#" wire:click="logout"><i data-feather="log-out"></i> Keluar</a>
                    @else
                    <a href="/login"><i data-feather="log-in"></i> Masuk</a>
                    @endif
                </li>
            </ul>
        </div>
    </section>
</header>

<script>
    function componentsHeader() {
        return {
            menu: true,
            gantiSandi: false,
            toggleGantiSandi() {
                this.menu = !this.menu
                this.gantiSandi = !this.gantiSandi
            }
        }
    }
</script>