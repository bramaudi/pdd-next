@extends('layouts.default')

@section('content')
<div class="flex justify-center">
    <div class="container p-5">

        <div class="breadcrumb">
            <a class="breadcrumb--item" href="/dashboard">Dashboard</a>
            <div class="breadcrumb--separator">/</div>
            <a class="breadcrumb--item" href="/dashboard/kependudukan/penduduk">Kependudukan</a>
            <div class="breadcrumb--separator">/</div>
            <a class="breadcrumb--item" href="/dashboard/kependudukan/penduduk">Penduduk</a>
            <div class="breadcrumb--separator">/</div>
            <span class="breadcrumb--item-active">Penduduk</span>
        </div>

        <livewire:penduduk.create />

    </div>
</div>
@endsection
