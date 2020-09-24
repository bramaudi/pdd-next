@extends('layouts.default')

@section('content')
<div class="container py-2">

    <h3>{{ $role->name }}</h3>

    <livewire:table.permission :roleId="$role->id" />

</div>
@endsection
