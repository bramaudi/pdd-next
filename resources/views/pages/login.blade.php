<div style="display: flex; justify-content: center; align-items: center; height: 80vh">
    <form wire:submit.prevent="submit" class="card pb-2">
        <div class="card-body">
    
            <div class="form-group @error('username') has-error @enderror">
                <label class="form-label" for="input-login-dropdown-user">Username / Email:</label>
                <input class="form-input" type="text" id="input-login-dropdown-user" wire:model="username">
                @error('username') <p class="form-input-hint">{{ $message }}</p>@enderror
            </div>
            <div class="form-group @error('password') has-error @enderror">
                <label class="form-label" for="input-login-dropdown-pass">Kata sandi</label>
                <input class="form-input" type="password" id="input-login-dropdown-pass" wire:model="password">
                @error('password') <p class="form-input-hint">{{ $message }}</p>@enderror
            </div>
            
            @include('includes/submit-button', ['text' => 'Masuk'])
        </div>
    </form>
</div>