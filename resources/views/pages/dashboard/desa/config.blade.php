@extends('layouts.default')

@section('content')
<div class="p-5">
    <x-breadcrumb current="Identitas Desa" :prev="[
        'Dashboard' => route('dashboard'),
        'Desa' => route('dashboard'),
    ]" />
    
    <livewire:desa.config />
</div>
@endsection
