@extends('layouts.default')

@section('content')
<div class="container py-2">

    <a class="btn mr-1" href="{{ route('keluarga.create') }}">
        <i class="icon icon-plus mr-2"></i> Tambah KK Baru
    </a>

    <livewire:keluarga.table />

</div>
@endsection
