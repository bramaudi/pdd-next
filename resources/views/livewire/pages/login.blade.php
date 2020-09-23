<div style="display: flex; justify-content: center; align-items: center; height: 80vh">
    <form wire:submit.prevent="submit" class="card pb-2">
        <div class="card-body">

            @include('livewire.includes/form-group', [
                'name' => 'username',
                'label' => 'Email / Username / NIK',
                'type' => 'text'
            ])

            @include('livewire.includes/form-group', [
                'name' => 'password',
                'label' => 'Kata Sandi',
                'type' => 'password'
            ])

            @include('livewire.includes/submit-button', ['text' => 'Masuk'])

        </div>
    </form>
</div>
