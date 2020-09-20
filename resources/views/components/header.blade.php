<header class="navbar" x-data="{ dropdown: false, menu: null }">
  <section class="navbar-section">
    <a href="#sidebar" class="off-canvas-toggle btn btn-link btn-action">
        <i class="icon icon-menu"></i>
    </a>
    <a href="/" class="navbar-brand mx-2">PDD</a>
  </section>
  <section class="navbar-section">
        <div class="dropdown" :class="{ 'active': dropdown }" @click="dropdown = true" @click.away="dropdown = false">
            @if(Auth::user())
            <div class="tile tile-centered" tabindex="0">
                <div class="tile-icon">
                    <img src="{{ $gravatar }}" alt="{{ Auth::user()->name }}" class="s-circle" style="width: 28px; float: left">
                </div>
                <div class="tile-content">{{ Auth::user()->name }}</div>
            </div>
            @else
                <div class="btn btn-primary btn-sm s-circle">
                    <i class="icon icon-person"></i>
                </div>
            @endif
            
            <ul class="menu avatar-dropdown" x-show="dropdown">
                @if(Auth::user())
                <li class="menu-item" x-show="menu == 'pass'">
                    <button @click="menu = null" type="button" class="btn btn-link text-left pl-0" style="width: 100%">
                        <i class="icon icon-back"></i>
                    </button>
                </li>
                <template x-if="menu == 'pass'">
                    <livewire:components.header.change-pass />
                </template>
                @endif

                <li class="menu-item" x-show="menu == null">
                    @if(Auth::user())
                    <a href="#" @click="menu = 'pass'"><i class="fas fa-unlock"></i> Ganti Kata Sandi</a>
                    <a href="#" wire:click="logout"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                    @else
                    <a href="/login"><i class="fas fa-sign-in-alt"></i> Masuk</a>
                    @endif
                </li>
            </ul>
        </div>
    </section>
</header>
