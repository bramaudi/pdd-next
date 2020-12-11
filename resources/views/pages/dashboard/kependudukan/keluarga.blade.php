@extends('layouts.default')

@section('content')
<div class="flex justify-center" x-data="{ modal: null }" @close-modals.window="modal = null">

    <div class="container p-5">

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

</div>
@endsection
