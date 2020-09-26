@extends('layouts.default')

@section('content')
<div class="container py-2" x-data="{ modal: null }" @close-modals.window="modal = null">

    <button class="btn m-1" @click="modal = 'create'">
        <i class="icon icon-plus mr-1"></i> Tambah Penduduk
    </button>

    <x-modal header="Buat Penduduk" state="create">
        livewire:penduduk.create 
    </x-modal>

    <x-modal header="Update Penduduk" state="update">
        livewire:penduduk.update 
    </x-modal>

    <x-modal header="Hapus Penduduk" state="delete">
        <livewire:penduduk.delete />
    </x-modal>

    <livewire:penduduk.table />

</div>
@endsection
