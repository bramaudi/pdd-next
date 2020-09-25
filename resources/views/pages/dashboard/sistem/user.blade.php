@extends('layouts.default')

@section('content')
<div class="container py-2" x-data="{ modal: null }" @close-modals.window="modal = null">

    <button class="btn m-1" @click="modal = 'create'">
        <i class="icon icon-plus mr-1"></i> Tambah Pengguna Baru
    </button>

    <x-modal header="Buat Pengguna" state="create">
        <livewire:user.create />
    </x-modal>

    <x-modal header="Update Pengguna" state="update">
        <livewire:user.update />
    </x-modal>

    <x-modal header="Hapus Pengguna" state="delete">
        <livewire:user.delete />
    </x-modal>

    <livewire:user.table />
    
</div>
@endsection
