@extends('layouts.default')

@section('content')
<div class="p-5" x-data="{ modal: null }" @close-modals.window="modal = null">
    <x-breadcrumb current="RW" :prev="[
        'Dashboard' => route('dashboard'),
        'Wilayah Administratif' => route('wilayah.dusun'),
    ]" />

    <button class="btn mb-3 flex" @click="modal = 'create'">
        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        Tambah RW
    </button>
    
    <div class="card p-5">

        <x-modal header="Tambah RW" state="create">
            <livewire:wilayah.rw.create :lingkungan="$lingkungan_id" />
        </x-modal>

        <x-modal header="Perbarui RW" state="update">
            <livewire:wilayah.rw.update :lingkungan="$lingkungan_id" />
        </x-modal>

        <x-modal header="Hapus RW" state="delete">
            <livewire:wilayah.rw.delete />
        </x-modal>

        <livewire:wilayah.rw.table :lingkungan="$lingkungan_id" /> 
    </div>
</div>
@endsection
