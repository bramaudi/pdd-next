<div class="header-dropdown" id="dropdown-avatar" x-data="dataDropdownAccount()">
    <div class="backdrop" onclick="closeDropdownAvatar()"></div>

    {{-- Dropdown Login --}}
    @if(!$auth)
    <div x-show="login">
        <div class="dropdown-links">
            <button @click="toggleLogin()">
                <i class="fas fa-arrow-left"></i>
            </button>
        </div>
        <livewire:components.header.dropdown-login />
    </div>
    @endif

    <div x-show="account" class="dropdown-links">
        {{-- Login Button --}}
        @if(!$auth)
        <button @click="toggleLogin()">
            <i class="fas fa-sign-in-alt"></i>
            Masuk
            <i class="fas fa-arrow-right"></i>
        </button>
        @endif

        {{-- Toggle Button --}}
        <button @click="toggleDark()"><i class="fas fa-moon"></i> Tema Gelap</button>
        
        {{-- Logout Button --}}
        @if($auth)
        <button wire:click="logout"><i class="fas fa-sign-out-alt"></i> Keluar </button>
        @endif
    </div>
</div>

<script>
    function dataDropdownAccount() {
        initPresistTheme()
        return {
            account: true,
            login: false,
            dark: localStorage.getItem('dark'),
            toggleLogin () {
                this.account = !this.account
                this.login = !this.login
            },
            toggleDark () {
                this.dark = !!(this.dark === 'true') // make sure it's boolean
                this.dark = !this.dark

                localStorage.setItem('dark', this.dark)
                document.body.classList.toggle('dark')
            }
        }
    }

    function initPresistTheme () {
        var dark = localStorage.getItem('dark')
        dark === 'true'
            ? document.body.classList.add('dark')
            : document.body.classList.remove('dark')
    }
    
    function closeDropdownAvatar () {
        document.querySelector('#dropdown-avatar').classList.remove('active')
    }
    
    function toggleDropdownLogin () {
        this.dropdownAvatar = !this.dropdownAvatar
        this.dropdownLogin = !this.dropdownLogin
    }
</script>