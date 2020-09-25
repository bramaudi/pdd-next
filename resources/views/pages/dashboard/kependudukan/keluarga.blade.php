@extends('layouts.default')

@section('content')
<div class="container py-2" x-data="{ modal: null }">

    <button class="btn" @click="modal = 'create'">
        <i class="icon icon-plus mr-2"></i> Tambah KK Baru
    </button>

    <x-modal header="Tambah KK Baru" state="create">
        <livewire:keluarga.create />
    </x-modal>

    <livewire:keluarga.table />

</div>
@endsection
