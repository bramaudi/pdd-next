@extends('layouts.default')

@section('content')
<div class="p-5">

    <h1 class="text-3xl font-extrabold mb-3">Dashboard</h1>

    <div class="flex flex-col sm:flex-row text-white">
        <div class="mx-1 sm:w-1/4 h-24 p-5 mb-2 rounded-lg shadow-lg" style="background: slateblue;">
            <div class="font-bold">Operator</div>
            <span class="text-3xl">{{ $operator }}</span>
        </div>
        <div class="mx-1 sm:w-1/4 h-24 p-5 mb-2 rounded-lg shadow-lg" style="background: teal;">
            <div class="font-bold">Penduduk</div>
            <span class="text-3xl">{{ $penduduk }}</span>
        </div>
        <div class="mx-1 sm:w-1/4 h-24 p-5 mb-2 rounded-lg shadow-lg" style="background: tomato;">
            <div class="font-bold">Keluarga</div>
            <span class="text-3xl">{{ $keluarga }}</span>
        </div>
        <div class="mx-1 sm:w-1/4 h-24 p-5 mb-2 rounded-lg shadow-lg bg-gray-800">
            <div class="font-bold">Wilayah Dusun</div>
            <span class="text-3xl">{{ $lingkungan }}</span>
        </div>
    </div>
        
</div>
@endsection
