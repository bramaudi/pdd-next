@extends('layouts.default')

@section('content')
<div class="p-5" x-data="{ modal: null }" @close-modals.window="modal = null">
    <x-breadcrumb current="Jabatan" :prev="[
        'Dashboard' => route('dashboard'),
        'Sistem' => route('role.index'),
    ]" />

    <button class="btn mb-3 inline-flex" @click="modal = 'create'">
        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        Buat Jabatan Baru
    </button>

    <x-modal header="Buat Jabatan Baru" state="create">
        <livewire:role.create />
    </x-modal>

    <x-modal header="Update Jabatan" state="update">
        <livewire:role.update />
    </x-modal>

    <x-modal header="Hapus Jabatan" state="delete">
        <livewire:role.delete />
    </x-modal>

    <livewire:role.table />
</div>
@endsection
