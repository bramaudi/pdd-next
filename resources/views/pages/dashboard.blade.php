@extends('layouts.default')

@section('content')
<div class="container py-2 dashboard">

    <h1>Dashboard</h1>

    <div class="columns">

        <div class="column col-3 col-sm-12">
            <div class="stats" style="background: slateblue;">
                <div class="title">Operator</div>
                <i class="fas fa-cog"></i>
                {{ $operator }}
            </div>
        </div>

        <div class="column col-3 col-sm-12">
            <div class="stats" style="background: teal;">
                <div class="title">Penduduk</div>
                <i class="fas fa-users"></i>
                {{ $penduduk }}
            </div>
        </div>

        <div class="column col-3 col-sm-12">
            <div class="stats" style="background: tomato;">
                <div class="title">Keluarga</div>
                <i class="fas fa-user-friends"></i>
                {{ $keluarga }}
            </div>
        </div>

        <div class="column col-3 col-sm-12">
            <div class="stats">
                <div class="title">Wilayah Dusun</div>
                <i class="fas fa-search-location"></i>
                {{ $lingkungan }}
            </div>
        </div>
        
    </div>

</div>
@endsection
