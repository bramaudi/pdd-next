@extends('layouts.default')

@section('content')
<div class="flex justify-center" x-data="{ modal: null }" @close-modals.window="modal = null">

    <div class="container p-5">

        <div class="breadcrumb">
            <a class="breadcrumb--item" href="/dashboard">Dashboard</a>
            <div class="breadcrumb--separator">/</div>
            <a class="breadcrumb--item" href="/dashboard/kependudukan/penduduk">Kependudukan</a>
            <div class="breadcrumb--separator">/</div>
            <span class="breadcrumb--item-active">Penduduk</span>
        </div>
    
        <x-modal header="Hapus Penduduk" state="delete">
            <livewire:penduduk.delete />
        </x-modal>
    
        <livewire:penduduk.table />

    </div>

</div>
@endsection
