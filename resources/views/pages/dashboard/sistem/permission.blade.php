@extends('layouts.default')

@section('content')
<div class="p-5">
    <div class="breadcrumb">
        <a class="breadcrumb--item" href="/dashboard">Dashboard</a>
        <div class="breadcrumb--separator">/</div>
        <a class="breadcrumb--item" href="/dashboard/sistem/role">Sistem</a>
        <div class="breadcrumb--separator">/</div>
        <a class="breadcrumb--item" href="/dashboard/sistem/role">Jabatan</a>
        <div class="breadcrumb--separator">/</div>
        <span class="breadcrumb--item-active">{{ $role->name }}</span>
    </div>

    <livewire:user.permission :roleId="$role->id" />
</div>
@endsection
