<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion @can('employee') toggled @endcan" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BMTUMY SIP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

   
    @can('admin')
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <div class="sidebar-heading">
            Pegawai
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('user') }}">
                <i class="fas fa-fw  fa-users"></i>
                <span>Daftar Pegawai</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('user/create') }}">
                <i class="fas fa-fw fa-plus-circle"></i>
                <span>Tambah Pegawai</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('placement') }}">
                <i class="fas fa-fw fa-plus-circle"></i>
                <span>Penempatan</span></a>
        </li>
    @endcan

    <li class="nav-item">
        <a class="nav-link" href="{{ route('financing-partner.index') }}">
            <i class="fas fa-fw fa-plus-circle"></i>
            <span>Mitra Pembiayaan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
