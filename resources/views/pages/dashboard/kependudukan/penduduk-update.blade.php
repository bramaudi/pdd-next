@extends('layouts.default')

@section('content')
<div class="container py-2">
    <livewire:penduduk.update :id="$id" />
</div>
@endsection
