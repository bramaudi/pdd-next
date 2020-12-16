@extends('layouts.default')

@section('content')
<div class="p-5">
    <livewire:keluarga.update :id="$id" />
</div>
@endsection
