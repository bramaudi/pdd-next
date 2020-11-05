@extends('layouts.default')

@section('content')
<div class="container py-2" x-data="{ modal: null }" @close-modals.window="modal = null">

    <ul class="px-1 m-none breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#">Wilayah Administratif</a>
        </li>
    </ul>

    <button class="btn m-1" @click="modal = 'create'">
        <i class="icon icon-plus mr-1"></i> Tambah Dusun
    </button>

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
@endsection
