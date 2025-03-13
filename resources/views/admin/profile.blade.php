@php

    $user = \Illuminate\Support\Facades\Auth::user();

    $role = \App\Models\Role::where('id', $user->role_id)->first();

@endphp

<x-dashboard-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile Information</h1>
    </div>

    <div class="row mb-3">
    
        <div class="col-xl-4 col-md-6">

            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th scope="row">Name </th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Username </th>
                        <td>{{ $user->username }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email </th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Role </th>
                        <td>{{ $role->title }}</td>
                    </tr>
                </tbody>
            </table>

            <a href="{{ url('admin/dashboard') }}" class="btn btn-primary">Back to Dashbord</a>
            <a href="{{ url('admin/change-password') }}" class="btn btn-success">Change Password</a>

        </div>

    </div>
    <!--Row-->

</x-dashboard-layout>