<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion @can('employee') toggled @endcan"
    id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user"></i>
        </div> -->
        <div class="sidebar-brand-text mx-3">BMTUMY SIP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    @can('admin')
        <div class="sidebar-heading">
            Pegawai
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('user') }}">
                <i class="fas fa-fw  fa-users"></i>
                <span>Daftar Pegawai</span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ url('user/create') }}">
        <i class="fas fa-fw fa-plus-circle"></i>
        <span>Tambah Pegawai</span>
        </a>
        </li> --}}
    @endcan

    <li class="nav-item">
        <a class="nav-link" href="{{ url('placement') }}">
            <i class="fa-solid fa-id-card"></i>
            <span>SK Penempatan</span>
        </a>
    </li>

    @can('admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('attendance.create') }}">
                <i class="fa-solid fa-clipboard-user"></i>
                <span>Presensi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('salary.create') }}">
                <i class="fa-solid fa-money-check-dollar"></i>
                <span>Gaji</span>
            </a>
        </li>
    @endcan

    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Marketing
    </div>

    @can('admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('marketing-reports.index') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Marketing Reports</span></a>
        </li>
    @endcan

    <li class="nav-item">
        <a class="nav-link" href="{{ route('financing-partner.index') }}">
            <i class="fa-solid fa-handshake"></i>
            <span>Mitra Pembiayaan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Kajian
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('kajian.index') }}">
            <i class="fa-solid fa-book-quran"></i>
            <span>Laporan Kajian</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Lain - lain
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('information.index') }}">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span>Info</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
