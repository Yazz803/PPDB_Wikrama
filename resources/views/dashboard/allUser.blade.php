@extends('dashboard.layouts.main')

@vite(['resources/sass/app.scss', 'resources/js/app.js'])

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 border border-dark px-4 py-3 rounded" style="background-color: #FFF">
        <h1 class="h3 mb-0 px-3 py-2 rounded font-weight-bold">All Users Account</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Dashboard / List Students</a>
    </div>

    <div class="container table-siswa">
        {{ $dataTable->table() }}
    </div>

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

@endsection