@extends('layouts.default')

@section('content')
<div class="container py-2">

    <button class="btn">
        <i class="icon icon-plus mr-2"></i> Tambah KK Baru
    </button>

    <livewire:table.keluarga />

</div>
@endsection
