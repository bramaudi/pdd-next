@extends('layouts.default')

@section('content')
<div class="container py-2" x-data="{ modal: null }" @close-modals.window="modal = null">

    <x-modal header="Hapus Keluarga" state="delete">
        <livewire:keluarga.delete />
    </x-modal>

    <livewire:keluarga.table />

</div>
@endsection
