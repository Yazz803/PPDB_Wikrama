@extends('dashboard.layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-laugh-wink"></i> Selamat Datang! {{ auth()->user()->name }}</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-info-circle fa-sm text-white-50"></i> Dashboard</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="alert alert-secondary" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
            <hr>
            <h4 class="alert-heading text-info font-weight-bold"><i class="fa fa-bell"></i> Notification</h4>
            <div class="alert alert-success" role="alert">
                A simple success alert—check it out!
            </div>
        </div>
    </div>

@endsection