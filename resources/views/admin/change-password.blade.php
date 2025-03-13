@php

    $user = \Illuminate\Support\Facades\Auth::user();

    $role = \App\Models\Role::where('id', $user->role_id)->first();

@endphp

<x-dashboard-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
    </div>

    <div class="row mb-3">
    
        <div class="col-xl-4 col-md-6">

            <form class="user" method="POST" action="{{ url('admin/update-password') }}">
                    
                @csrf

                <div class="form-group">
                    <x-form.input name="name" type="text" disabled="disabled" value="{{ $user->name }}"/>
                    <x-form.error name="name"/>
                </div>
                <div class="form-group">
                    <x-form.input name="email" type="email" disabled="disabled" value="{{ $user->email }}"/>
                    <x-form.error name="email"/>
                </div>
                <div class="form-group">
                    <x-form.input name="current-password" type="password" placeholder="Current Password"/>
                    <x-form.error name="current-password"/>
                </div>
                <div class="form-group">
                    <x-form.input name="new-password" type="password" placeholder="New Password"/>
                    <x-form.error name="new-password"/>
                </div>
                <div class="form-group">
                    <x-form.input name="repeat-password" type="password" placeholder="Repeat New Password"/>
                    <x-form.error name="repeat-password"/>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Update Password</button>
                </div>
                </form>

            <a href="{{ url('admin/dashboard') }}" class="btn btn-primary">Back to Dashbord</a>
            <a href="{{ url('admin/profile') }}" class="btn btn-info">Back to Profile</a>

        </div>

    </div>
    <!--Row-->

</x-dashboard-layout>