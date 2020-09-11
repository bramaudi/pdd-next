<div id="login-form" class="display-center">
    <form wire:submit.prevent="submit" class="card p-2">
        <label for="login-form-user">Nama Pengguna / Email:</label>
        <input type="text" id="login-form-user" wire:model="username">
        @error('username')
            <span class="input-hint">{{ $message }}</span>
        @enderror
        
        <label for="login-form-pass">Kata Sandi:</label>
        <input type="password" id="login-form-pass" wire:model="password">
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

<style type="text/css">
    #login-form form {
        width: 300px;
    }
</style>