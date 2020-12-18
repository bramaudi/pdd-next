@extends('layouts.default')

@section('content')
<div class="p-5">
    <x-breadcrumb :current="$role->name" :prev="[
        'Dashboard' => route('dashboard'),
        'Sistem' => route('role.index'),
        'Jabatan' => route('role.index'),
    ]" />

    <livewire:user.permission :roleId="$role->id" />
</div>
@endsection
