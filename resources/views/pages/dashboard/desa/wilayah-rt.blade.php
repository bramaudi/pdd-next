@extends('layouts.default')

@section('content')
<div class="p-5" x-data="{ modal: null }" @close-modals.window="modal = null">
    <div class="breadcrumb">
        <a class="breadcrumb--item" href="dashboard">Dashboard</a>
        <div class="breadcrumb--separator">/</div>
        <a class="breadcrumb--item" href="{{ route('wilayah.dusun') }}">Wilayah Administratif</a>
        <div class="breadcrumb--separator">/</div>
        <a class="breadcrumb--item" href="{{ route('wilayah.rw', ['lingkungan_id' => $lingkungan_id]) }}">RW</a>
        <div class="breadcrumb--separator">/</div>
        <span class="breadcrumb--item-active" href="#">RT</span>
    </div>
    
    <button class="btn mb-3 flex" @click="modal = 'create'">
        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        Tambah RT
    </button>

    <div class="card p-5">
    
        <x-modal header="Tambah RT" state="create">
            <livewire:wilayah.rt.create :rw="$rw_id" />
        </x-modal>
    
        <x-modal header="Perbarui RT" state="update">
            <livewire:wilayah.rt.update :rw="$rw_id" />
        </x-modal>
    
        <x-modal header="Hapus RT" state="delete">
            <livewire:wilayah.rt.delete :rw="$rw_id" />
        </x-modal>
    
        <livewire:wilayah.rt.table :rw="$rw_id" />
    </div>
</div>
@endsection
