<x-dashboard-layout>

    @php

        $users = \App\Models\User::all();

    @endphp

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <x-flash/>
            </div>
        </div>
    </div>

    <div class="row mb-3">
    <!-- Total Users -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Total User</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                    @php

                        echo $users->count();

                    @endphp
                </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-user fa-2x text-info"></i>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Total Users -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Number of Boards</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                @php

                    echo $users->where('role_id', '4')->count();

                @endphp
                </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-tablet fa-2x text-info"></i>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Total Users -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Candidated to Assign</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">0</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-user-graduate fa-2x text-info"></i>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Total Users -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Mark Entry Done</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">0</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-check fa-2x text-info"></i>
            </div>
            </div>
        </div>
        </div>
    </div>

    </div>
    <!--Row-->

    @php

        echo 'Role: ' . auth()->user()->role->title;
        echo ' & Role ID: ' . auth()->user()->role->id;

    @endphp

</x-dashboard-layout>