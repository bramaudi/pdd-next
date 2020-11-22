@extends('layouts.default')

@section('content')
<div class="container py-2" x-data="{ modal: null }" @close-modals.window="modal = null">

    <button class="btn m-1" @click="modal = 'create'">
        <i class="icon icon-plus mr-1"></i> Buat Format Baru
    </button>

    <x-modal header="Buat Format Baru" state="create">
        <livewire:surat.format.create />
    </x-modal>

    <x-modal header="Update Format" state="update">
        <livewire:surat.format.update />
    </x-modal>

    <x-modal header="Hapus Format" state="delete">
        <livewire:surat.format.delete />
    </x-modal>

    <livewire:surat.format.table />

@endsection
