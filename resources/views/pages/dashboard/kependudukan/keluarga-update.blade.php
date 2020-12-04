@extends('layouts.default')

@section('content')
<div class="container py-2">
    <livewire:keluarga.update :id="$id" />
</div>
@endsection
