@extends('layouts.default')

@section('content')
<div class="flex justify-center">
    <div class="container p-5">
        <livewire:keluarga.update :id="$id" />
    </div>
</div>
@endsection
