@extends('layouts.default')

@section('content')
<div class="container py-2" x-data="{ modal: null }" @close-modals.window="modal = null">

    <a class="btn mr-1" href="{{ route('keluarga.create') }}">
        <i class="icon icon-plus mr-2"></i> Tambah KK Baru
    </a>

    <x-modal header="Hapus Keluarga" state="delete">
        <livewire:keluarga.delete />
    </x-modal>

    <livewire:keluarga.table />

</div>
@endsection
