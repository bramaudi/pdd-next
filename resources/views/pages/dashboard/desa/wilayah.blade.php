@extends('layouts.default')

@section('content')
<div class="p-5" x-data="{ modal: null }" @close-modals.window="modal = null">
    <x-breadcrumb current="Wilayah Administratif" :prev="[
        'Dashboard' => route('dashboard'),
    ]" />

    <button class="btn mb-3 flex" @click="modal = 'create'">
        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        Tambah Dusun
    </button>
    
    <div class="card p-5">
    
        <x-modal header="Tambah Dusun" state="create">
            <livewire:wilayah.create />
        </x-modal>
    
        <x-modal header="Perbarui Data Dusun" state="update">
            <livewire:wilayah.update />
        </x-modal>
    
        <x-modal header="Hapus Data Dusun" state="delete">
            <livewire:wilayah.delete />
        </x-modal>
    
        <livewire:wilayah.table />
    </div>
</div>
@endsection
