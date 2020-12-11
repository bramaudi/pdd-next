@extends('layouts.default')

@section('content')
<div class="flex justify-center">
    <div class="container p-5">
        <livewire:penduduk.create :kk="true" />
    </div>
</div>
@endsection
