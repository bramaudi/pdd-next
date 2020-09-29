@extends('layouts.default')

@section('content')
<div class="container py-2" x-data="{ modal: null }" @close-modals.window="modal = null">

    <a class="btn m-1" href="{{ route('penduduk.create') }}">
        <i class="icon icon-plus mr-1"></i> Tambah Penduduk
    </a>

    <x-modal header="Hapus Penduduk" state="delete">
        <livewire:penduduk.delete />
    </x-modal>

    <livewire:penduduk.table />

</div>
@endsection
