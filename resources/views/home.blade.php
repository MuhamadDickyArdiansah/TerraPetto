@extends('layouts.sbadmin2')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>
        <div class="card-body">
            <div>
               @if(Auth::user()->role !== null && Auth::user()->role !== 'pasien')
                    <a href="/administrasi/create" class="btn btn-primary m-1">Buat Administrasi</a>
                    <a href="/pasien/create" class="btn btn-primary m-1">Tambah Pasien</a>
                    <a href="/dokter/create" class="btn btn-primary m-1">Tambah Dokter</a>
                
                @elseif(Auth::user()->role == null || Auth::user()->role == 'pasien')
                    @include('flash::message')
                    @yield('content')
                @endif
            </div>
        </div>
    </div>
@endsection
