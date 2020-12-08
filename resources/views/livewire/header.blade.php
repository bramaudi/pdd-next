<div class="ml-auto flex items-center">

    <!-- <a class="header-dot">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
    </a> -->

    <!-- <a x-data="{ open: false }" class="header-dot relative">
        <svg @click="open = !open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
        <div @click="open = !open" class="absolute w-5 h-5 text-sm text-center top-0 right-0 rounded-full bg-red-600 text-white">3</div>
        <div x-show="open" @click.away="open = false" class="header-dot-content -mr-5">
            <div class="p-3 text-xs border-b">Nisi aliqua veniam officia elit.</div>
            <div class="p-3 text-xs border-b">Aliquip nisi exercitation.</div>
            <div class="p-3 text-xs border-b">Id dolor laborum veniam proident pariatur.</div>
        </div>
    </a> -->

    <div x-data="{ open: false }" class="header-dot relative">
        @if(Auth::user())
        <img @click="open = !open" src="{{ $gravatar }}" alt="{{ Auth::user()->name }}" class="w-6 h-6 rounded-full">
        @else
        <svg @click="open = !open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
        @endif

        <div x-show="open" @click.away="open = false" class="header-dot-content p-2">
            @if(Auth::user())
            <a class="header-link" href="#logout" wire:click="logout">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Logout
            </a>
            @else
            <a class="header-link" href="/login">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                Login
            </a>
            @endif
        </div>
    </div>

</div>
