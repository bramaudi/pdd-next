@extends('layouts.default')

@section('content')
<div class="p-5" x-data="{ modal: null }" @close-modals.window="modal = null">

    <x-breadcrumb current="Penduduk" :prev="[
        'Dashboard' => route('dashboard'),
        'Kependudukan' => route('dashboard'),
    ]" />

    <a class="btn mb-3 inline-flex" href="{{ route('penduduk.create') }}">
        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        Tambah Penduduk
    </a>

    <x-modal header="Hapus Penduduk" state="delete">
        <livewire:penduduk.delete />
    </x-modal>

    <livewire:penduduk.table />
</div>
@endsection
