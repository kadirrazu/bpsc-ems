<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin/dashboard') }}">
    <div class="sidebar-brand-icon">
        <img src="{{ asset('assets/img/govt-logo-2.png') }}">
    </div>
    <div class="sidebar-brand-text mx-3">BPSC EMS</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
    <a class="nav-link" href="{{ url('admin/dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
    Role Based Access Area
    </div>

    @if( auth()->user()->role->id === 1 || auth()->user()->role->id === 3 )

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fas fa-user"></i>
            <span>Chairman</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Task Panel</h6>
            <a class="collapse-item" href="{{ url('admin/chairman-board-assignment'); }}">Board Assignment</a>
            <a class="collapse-item" href="{{ url('admin/chairman-statistics'); }}">Statistics</a>
            </div>
        </div>
    </li>

    @endif

    @if( auth()->user()->role->id === 1 || auth()->user()->role->id === 4 )

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2"
            aria-expanded="true" aria-controls="collapseBootstrap2">
            <i class="far fa-fw fas fa-users"></i>
            <span>Member</span>
        </a>
        <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Task Panel</h6>
            <a class="collapse-item" href="alerts.html">Attend a Board</a>
            <a class="collapse-item" href="buttons.html">Statistics</a>
            </div>
        </div>
    </li>

    @endif

    @if( auth()->user()->role->id === 1 || auth()->user()->role->id === 2 )

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap3"
            aria-expanded="true" aria-controls="collapseBootstrap3">
            <i class="far fa-fw fas fa-gears"></i>
            <span>Administrator</span>
        </a>
        <div id="collapseBootstrap3" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Task Panel</h6>
            <a class="collapse-item" href="{{ url('admin/add-user'); }}">Add a User</a>
            <a class="collapse-item" href="{{ url('admin/user-list'); }}">Users List</a>
            <a class="collapse-item" href="{{ url('admin/import-candidates'); }}">Import Board Candidates</a>
            </div>
        </div>
    </li>

    @endif

    <hr class="sidebar-divider">

    <div class="version">Version: Beta 1.0</div>

</ul>
<!-- Sidebar -->