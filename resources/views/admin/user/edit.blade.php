@php

    $users = \App\Models\User::all();

@endphp

<x-dashboard-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
    </div>

    <div class="row mb-3">
    
        <div class="col-xl-6 col-md-6">

            <x-flash/>

            <form class="user" method="POST" action="{{ url('admin/update-user/' . $user->id ) }}" autocomplete="off">
                    
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                      <x-form.input name="name" type="text" value="{{ $user->name }}"/>
                      <x-form.error name="name"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-4 col-form-label">Username</label>
                    <div class="col-sm-8">
                      <x-form.input name="username" type="text" value="{{ $user->username }}"/>
                      <x-form.error name="username"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">Email Address</label>
                    <div class="col-sm-8">
                      <x-form.input name="email" type="email" value="{{ $user->email }}"/>
                      <x-form.error name="email"/>
                    </div>
                </div>
                
                <div class="form-group row">

                    <label for="role_id" class="col-sm-4 col-form-label">User Role</label>
                    <div class="col-sm-8">

                      @php

                          $allRoles = \App\Models\Role::orderBy('id', 'asc')->get();
                              
                      @endphp

                      <select name="role_id" id="role_id" class="form-select form-control">
                          <option value="">Please Select a Role</option>
                          @foreach( $allRoles as $role )
                              <option value="{{ $role->id }}" {{ $user->role->id == $role->id ? 'selected="selected"' : '' }}>{{ $role->title }}</option>
                          @endforeach
                      </select>
                      <x-form.error name="role_id"/>
                    </div>
                </div>

                <div class="form-part-contitional hidden">
                    <div class="form-group row">
                        <label for="joining_date" class="col-sm-4 col-form-label">Joining Date</label>
                        <div class="col-sm-8">
                          <x-form.input name="joining_date" type="text" placeholder="Pick Joining Date (Optional)" value="{{ $user->role->id == '4' ? $user->member->joining_date : '' }}"/>
                          <x-form.error name="joining_date"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="leaving_date" class="col-sm-4 col-form-label">Leaving Date</label>
                        <div class="col-sm-8">
                          <x-form.input name="leaving_date" type="text" placeholder="Pick Leaving Date (Optional)" value="{{ $user->role->id == '4' ? $user->member->leaving_date : '' }}"/>
                          <x-form.error name="leaving_date"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="unit" class="col-sm-4 col-form-label">Unit</label>
                        <div class="col-sm-8">
                          <select name="unit" id="unit" class="form-select form-control">
                              <option value="">Select Concern Unit (Optional)</option>
                              @for($i=1; $i<=20; $i++)
                                  <option value="{{ $i }}" {{ ( $user->role->id == '4' && $user->member->unit == $i ) ? 'selected="selected"' : '' }}>Unit {{ $i }}</option>
                              @endfor
                          </select>
                          <x-form.error name="unit"/>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status" class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-8">
                      <select name="status" id="status" class="form-select form-control">
                          <option value="">Select User Status</option>
                          <option value="1" {{ $user->status== '1' ? 'selected="selected"' : '' }}>Active</option>
                          <option value="0" {{ $user->status== '0' ? 'selected="selected"' : '' }}>Inactive</option>
                      </select>
                      <x-form.error name="status"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                      <x-form.input name="password" type="password"/>
                      <x-form.error name="password"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password_confirmation" class="col-sm-4 col-form-label">Confirm Password</label>
                    <div class="col-sm-8">
                      <x-form.input name="password_confirmation" type="password"/>
                      <x-form.error name="password_confirmation"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="submit" class="col-sm-4 col-form-label"></label>
                    <div class="col-sm-8">
                      <button class="btn btn-warning" type="submit">Update</button>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="submit" class="col-sm-4 col-form-label"></label>
                    <div class="col-sm-8">
                      <a href="{{ url('admin/dashboard') }}" class="btn btn-primary">Back to Dashbord</a>
                      <a href="{{ url('admin/user-list') }}" class="btn btn-info">Back to User List</a>
                    </div>
                </div>

              </form>

        </div>

    </div>
    <!--Row-->

</x-dashboard-layout>

<!-- Bootstrap Datepicker -->
<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<script>
    $(document).ready(function () {

        $('#role_id').on('change', function() {
            if( this.value == 4 ){
                $('.form-part-contitional').show();
            }
            else{
                $('.form-part-contitional').hide();
            }
        });

        var roleID = $('#role_id').val(); 

        if( roleID == 4 ){
            $('.form-part-contitional').show();
        }
        else{
            $('.form-part-contitional').hide();
        }

        // Bootstrap Date Picker
        $('#joining_date').datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: 'linked',
            todayHighlight: true,
            autoclose: true,        
        });

        $('#leaving_date').datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: 'linked',
            todayHighlight: true,
            autoclose: true,        
        });

    });
</script>