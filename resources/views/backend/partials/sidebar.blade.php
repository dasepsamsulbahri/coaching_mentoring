<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BPSDM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('home.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    
    @if (auth()->user()->hasRole(['Super Admin']))
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Admin
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('role.index')}}">
            <i class="fas fa-key"></i>
            <span>Role</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('mentor.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Mentor</span>
        </a>
    </li>
    @endif
    
    @if (auth()->user()->hasRole(['Super Admin|Admin|Mentor|Peserta']))
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Kegiatan
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{route('kegiatan.index')}}">
            <i class="fas fa-tasks"></i>
            <span>Data Kegiatan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('peserta.index')}}">
            <i class="fas fa-user-friends"></i>
            <span>Peserta Kegiatan</span>
        </a>
    </li>
    @endif
    <hr class="sidebar-divider">
    
    <!-- Heading -->
    @if (auth()->user()->hasRole(['Super Admin|Mentor|Admin']))
    <div class="sidebar-heading">
        Mentor
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{route('laporan.index')}}">
            <i class="fas fa-users"></i>
            <span>Cek Laporan</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    @endif
    
    
    <!-- Divider -->
    @if (auth()->user()->hasRole(['Super Admin|Peserta|Admin']))

    <!-- Heading -->
    <div class="sidebar-heading">
        Peserta
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('laporan.index')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Laporan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Sertifikat</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    @endif
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->