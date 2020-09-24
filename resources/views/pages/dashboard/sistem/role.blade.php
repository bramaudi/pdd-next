@extends('layouts.default')

@section('content')
<div class="container py-2" x-data="{ modal: null }" @close-modals.window="modal = null">

    <button class="btn m-1" @click="modal = 'add'">
        <i class="icon icon-plus mr-1"></i> Buat Jabatan Baru
    </button>

    {{-- Modal Buat Jabatan Baru --}}

    <div :class="{ 'active': modal == 'add' }" class="modal">
        <a href="#close" @click="modal = null" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" @click="modal = null" class="btn btn-clear float-right" aria-label="Close"></a>
                <div class="modal-title h5">Buat Jabatan Baru</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <livewire:form.role.create />
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Update Jabatan --}}

    <div :class="{ 'active': modal == 'update' }" class="modal">
        <a href="#close" @click="modal = null" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" @click="modal = null" class="btn btn-clear float-right" aria-label="Close"></a>
                <div class="modal-title h5">Update Jabatan</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <livewire:form.role.update />
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Hapus Jabatan --}}

    <div :class="{ 'active': modal == 'delete' }" class="modal">
        <a href="#close" @click="modal = null" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" @click="modal = null" class="btn btn-clear float-right" aria-label="Close"></a>
                <div class="modal-title h5">Hapus Jabatan</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <livewire:form.role.delete />
                </div>
            </div>
        </div>
    </div>

    <livewire:table.role />

@endsection
