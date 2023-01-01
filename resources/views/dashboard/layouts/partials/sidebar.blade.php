<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary border border-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.index') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('assets/pages/images/logo-wk.png') }}" width="40" alt="">
        </div>
        <div class="sidebar-brand-text mx-2" style="font-size: 13px">PPDB 2023 - 2024</div>
    </a>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('landingpage') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Landing Page</span></a>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-server"></i>
            <span>Dashboard</span></a>
    </li>

    @if(auth()->user()->role == 'user')
        <li class="nav-item {{ Request::is('dashboard/pembayaran*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.pembayaran.user') }}">
                <i class="fas fa-fw fa-credit-card"></i>
                <span>Pembayaran</span></a>
        </li>
    @endif

    @if(auth()->user()->role == 'admin')
        <li class="nav-item {{ Request::is('dashboard/pembayaran*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.pembayaran.admin') }}">
                <i class="fas fa-fw fa-credit-card"></i>
                <span>Pembayaran</span></a>
        </li>
        <li class="nav-item {{ Request::is('dashboard/data-siswa*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.dataSemuaSiswa') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Students</span></a>
        </li>

        <li class="nav-item {{ Request::is('dashboard/all-users*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.allUsers') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>All Users</span></a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->