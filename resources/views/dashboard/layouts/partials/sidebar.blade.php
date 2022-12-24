<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.index') }}">
        <div class="sidebar-brand-text mx-3">PPDB 2023 - 2024</div>
    </a>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('landingpage') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Landing Page</span></a>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        Dashboard
    </div>

    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ Request::is('dashboard/pembayaran*') ? 'active' : '' }}">
        @if(auth()->user()->role == 'user')
        <a class="nav-link" href="{{ route('dashboard.pembayaran.user') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pembayaran</span></a>
        @elseif(auth()->user()->role == 'admin')
        <a class="nav-link" href="{{ route('dashboard.pembayaran.admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pembayaran</span></a>
        @endif
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->