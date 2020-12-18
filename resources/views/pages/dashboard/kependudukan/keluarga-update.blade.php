@extends('layouts.default')

@section('content')
<div class="p-5">
    <x-breadcrumb current="Ubah" :prev="[
        'Dashboard' => route('dashboard'),
        'Kependudukan' => route('dashboard'),
        'Keluarga' => route('dashboard'),
    ]" />

    <livewire:keluarga.update :id="$id" />
</div>
@endsection
