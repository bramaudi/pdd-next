@extends('layouts.default')

@section('content')
<div class="p-5">
    <x-breadcrumb current="Ubah" :prev="[
        'Dashboard' => route('dashboard'),
        'Kependudukan' => route('dashboard'),
        'Penduduk' => route('dashboard'),
    ]" />

    <livewire:penduduk.update :id="$id" />
</div>
@endsection
