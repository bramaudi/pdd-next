@extends('layouts.default')

@section('content')
<div class="p-5">
    <x-breadcrumb current="Tambah" :prev="[
        'Dashboard' => route('dashboard'),
        'Kependudukan' => route('dashboard'),
        'Keluarga' => route('dashboard'),
    ]" />

    <livewire:penduduk.create :kk="true" />
</div>
@endsection
