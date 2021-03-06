@extends('layouts.default')

@section('content')
<div class="p-5" x-data="{ modal: null }" @close-modals.window="modal = null">
    <x-breadcrumb current="Operator" :prev="[
        'Dashboard' => route('dashboard'),
        'Sistem' => route('dashboard'),
    ]" />

    <button class="btn mb-3 inline-flex" @click="modal = 'create'">
        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        Tambah Pengguna Baru
    </button>
    
    <div class="card p-5">

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
</div>
@endsection
