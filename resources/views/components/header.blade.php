<header class="navbar">
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
                {{--
                <li class="menu-item">
                    <button wire:click="toggleLogin" type="button" class="btn btn-link text-left pl-0" style="width: 100%">
                        <i class="icon icon-back"></i>
                    </button>
                </li>
                --}}

                @if($state['menu'])
                <li class="menu-item">
                    @if(Auth::user())
                    <a href="#" wire:click="logout">Keluar</a>
                    @else
                    <a href="/login">Masuk</a>
                    @endif
                </li>
                @endif
            </ul>
        </div>
    </section>
</header>
