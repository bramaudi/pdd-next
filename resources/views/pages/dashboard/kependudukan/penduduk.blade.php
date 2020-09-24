@extends('layouts.default')

@section('content')
<div class="container py-2" x-data="{ modal: null }" @close-modals.window="modal = null">

    <button class="btn m-1" @click="modal = 'add'">
        <i class="icon icon-plus mr-1"></i> Tambah Penduduk
    </button>

    {{-- Modal Add --}}

    <div :class="{ 'active': modal == 'add' }" class="modal">
        <a href="#close" @click="modal = null" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" @click="modal = null" class="btn btn-clear float-right" aria-label="Close"></a>
                <div class="modal-title h5">Tambah Penduduk</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <!-- livewire:form.user.create -->
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}

    <div :class="{ 'active': modal == 'edit' }" class="modal">
        <a href="#close" @click="modal = null" wire:click="$emit('resetLoaded')" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" @click="modal = null" wire:click="$emit('resetLoaded')" class="btn btn-clear float-right" aria-label="Close"></a>
                <div class="modal-title h5">Ubah Data Penduduk</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <!-- livewire:form.user.update  -->
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Delete --}}

    <div :class="{ 'active': modal == 'delete' }" class="modal">
        <a href="#close" @click="modal = null" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" @click="modal = null" class="btn btn-clear float-right" aria-label="Close"></a>
                <div class="modal-title h5">Hapus Penduduk</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <!-- livewire:form.user.delete -->
                </div>
            </div>
        </div>
    </div>

    <livewire:table.penduduk />

</div>
@endsection
