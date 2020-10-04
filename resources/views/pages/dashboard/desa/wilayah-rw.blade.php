@extends('layouts.default')

@section('content')
<div class="container py-2" x-data="{ modal: null }" @close-modals.window="modal = null">

    <button class="btn m-1" @click="modal = 'create'">
        <i class="icon icon-plus mr-1"></i> Tambah RW
    </button>

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
@endsection
