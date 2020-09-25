@extends('layouts.default')

@section('content')
<div class="container py-2" x-data="{ modal: null }" @close-modals.window="modal = null">

    <button class="btn m-1" @click="modal = 'create'">
        <i class="icon icon-plus mr-1"></i> Buat Jabatan Baru
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

@endsection
