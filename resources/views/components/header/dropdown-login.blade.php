<div id="dropdown-login">
    <div style="padding: 10px">
        <form wire:submit.prevent="submit">
                <label for="login-dropdown-user">Nama Pengguna / Email:</label>
                <input type="text" id="login-dropdown-user" wire:model="username">
                @error('username')
                    <span class="input-hint">{{ $message }}</span>
                @enderror
                
                <label for="login-dropdown-pass">Kata Sandi:</label>
                <input type="password" id="login-dropdown-pass" wire:model="password">
                @error('password')
                    <span class="input-hint">{{ $message }}</span>
                @enderror
                
                <button class="btn" type="submit">Masuk</button>
                
                @if(session()->has('failed'))
                    <div class="alert alert-danger">
                        {{ session('failed') }}
                    </div>
                @endif
        </form>
    </div>
</div>
