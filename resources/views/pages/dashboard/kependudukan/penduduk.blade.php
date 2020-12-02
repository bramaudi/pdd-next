@extends('layouts.default')

@section('content')
<div class="container py-2" x-data="{ modal: null }" @close-modals.window="modal = null">

    <x-modal header="Hapus Penduduk" state="delete">
        <livewire:penduduk.delete />
    </x-modal>

    <livewire:penduduk.table />

</div>
@endsection
