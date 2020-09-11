<header>
    <button class="nav-btn" onclick="toggleSidebar()">
        <i class="fas fa-bars fa-lg"></i>
    </button>
    
    <div class="brand">PDD</div>

    <div class="menu" onclick="toggleAvatarDropdown()">
        <div class="avatar">
            @if(Auth::user())
                <img src="{{ $gravatar }}" alt="{{ Auth::user()->name }}" />
            @else
                <i class="fas fa-user"></i>
            @endif
        </div>
    </div>

    <!-- Dropdown content -->
    <livewire:components.header.dropdown-account />
</header>

<script>
    function toggleSidebar () {
      var sidebarElement = document.querySelector('aside#sidebar')
      var toggleButtonElement = document.querySelector('header .nav-btn')
      sidebarElement.classList.toggle('active')
      sidebarElement.classList.contains('active')
        ? toggleButtonElement.classList.add('focus')
        : toggleButtonElement.classList.remove('focus')
    }

    function toggleAvatarDropdown () {
      document.querySelector('#dropdown-avatar').classList.toggle('active')
    }
</script>