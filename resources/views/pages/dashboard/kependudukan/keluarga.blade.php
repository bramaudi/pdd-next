@extends('layouts.default')

@section('content')
<div class="p-5" x-data="{ modal: null }" @close-modals.window="modal = null">
    <div class="breadcrumb">
        <a class="breadcrumb--item" href="/dashboard">Dashboard</a>
        <div class="breadcrumb--separator">/</div>
        <a class="breadcrumb--item" href="/dashboard/kependudukan/keluarga">Kependudukan</a>
        <div class="breadcrumb--separator">/</div>
        <span class="breadcrumb--item-active">Keluarga</span>
    </div>

    <x-modal header="Hapus Keluarga" state="delete">
        <livewire:keluarga.delete />
    </x-modal>

    <livewire:keluarga.table />
</div>
@endsection
