@php

    $user = \Illuminate\Support\Facades\Auth::user();

    $role = \App\Models\Role::where('id', $user->role_id)->first();

@endphp

<x-dashboard-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add a New User</h1>
    </div>

    <div class="row mb-3">
    
        <div class="col-xl-4 col-md-6">

            <x-flash/>

            <form class="user" method="POST" action="{{ url('admin/add-user') }}" autocomplete="off">
                    
                @csrf

                <div class="form-group">
                    <x-form.input name="name" type="text" placeholder="Name"/>
                    <x-form.error name="name"/>
                </div>
                <div class="form-group">
                    <x-form.input name="username" type="text" placeholder="Username" autocomplete="off"/>
                    <x-form.error name="username"/>
                </div>
                <div class="form-group">
                    <x-form.input name="email" type="email" placeholder="Email Address"/>
                    <x-form.error name="email"/>
                </div>
                
                <div class="form-group">

                    @php

                        $allRoles = \App\Models\Role::orderBy('id', 'asc')->get();
                            
                    @endphp

                    <select name="role_id" id="role_id" class="form-select form-control">
                        <option value="">Please Select a Role</option>
                        @foreach( $allRoles as $role )
                            <option value="{{ $role->id }}">{{ $role->title }}</option>
                        @endforeach
                    </select>
                    <x-form.error name="role_id"/>
                </div>

                <div class="form-part-contitional hidden">
                    <div class="form-group">
                        <x-form.input name="joining_date" type="text" placeholder="Pick Joining Date (Optional)"/>
                        <x-form.error name="joining_date"/>
                    </div>
                    <div class="form-group">
                        <select name="unit" id="unit" class="form-select form-control">
                            <option value="">Select Concern Unit (Optional)</option>
                            @for($i=1; $i<=20; $i++)
                                <option value="{{ $i }}">Unit {{ $i }}</option>
                            @endfor
                        </select>
                        <x-form.error name="unit"/>
                    </div>
                </div>

                <div class="form-group">
                    <select name="status" id="status" class="form-select form-control">
                        <option value="">Select User Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <x-form.error name="status"/>
                </div>

                <div class="form-group">
                    <x-form.input name="password" type="password" placeholder="New Password" autocomplete="off"/>
                    <x-form.error name="password"/>
                </div>
                <div class="form-group">
                    <x-form.input name="password_confirmation" type="password" placeholder="Confirm New Password" autocomplete="off"/>
                    <x-form.error name="password_confirmation"/>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Add User</button>
                </div>
                </form>

            <a href="{{ url('admin/dashboard') }}" class="btn btn-primary">Back to Dashbord</a>

        </div>

    </div>
    <!--Row-->

</x-dashboard-layout>

<!-- Bootstrap Datepicker -->
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<script>
    $( document ).ready(function() {

        $('#role_id').on('change', function() {
            if( this.value == 4 ){
                $('.form-part-contitional').show();
            }
            else{
                $('.form-part-contitional').hide();
            }
        });

        // Bootstrap Date Picker
        $('#joining_date').datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: 'linked',
            todayHighlight: true,
            autoclose: true,        
        });

    });
</script>