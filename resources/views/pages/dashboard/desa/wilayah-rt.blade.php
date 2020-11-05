@extends('layouts.default')

@section('content')
<div class="container py-2" x-data="{ modal: null }" @close-modals.window="modal = null">

    <ul class="px-1 m-none breadcrumb">
        <li class="breadcrumb-item">
            <a href="dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('wilayah.dusun') }}">Wilayah Administratif</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('wilayah.rw', ['lingkungan_id' => $lingkungan_id]) }}">RW</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#">RT</a>
        </li>
    </ul>

    <button class="btn m-1" @click="modal = 'create'">
        <i class="icon icon-plus mr-1"></i> Tambah RT
    </button>

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
@endsection
