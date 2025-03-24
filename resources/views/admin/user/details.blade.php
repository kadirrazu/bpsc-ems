@php

    $users = \App\Models\User::all();

@endphp

<x-dashboard-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User Details</h1>
    </div>

    <div class="row mb-3">
    
        <div class="col-xl-6 col-md-6">

            <x-flash/>

            <table class="table table-bordered">
              <tr>
                <th>Name: </th>
                <td>{{ $user->name }}</td>
              </tr>
              <tr>
                <th>Username: </th>
                <td>{{ $user->username }}</td>
              </tr>
              <tr>
                <th>Email: </th>
                <td>{{ $user->email }}</td>
              </tr>
              <tr>
                <th>Role: </th>
                <td>{{ $user->role->title }}</td>
              </tr>
              <tr>
                <th>Status: </th>
                <td>{{ $user->status == 1 ? 'Active' : 'Inactive' }}</td>
              </tr>
              <tr>
                <th>Action: </th>
                <td>
                  <a href="{{ url('admin/user-edit/' . $user->id ) }}" class="btn btn-warning">Edit</a>
                  <a href="{{ url('admin/user-delete/' . $user->id ) }}" class="btn btn-danger">Delete</a>
                </td>
              </tr>
            </table>

            <br>

            <a href="{{ url('admin/dashboard') }}" class="btn btn-primary">Back to Dashbord</a>
            <a href="{{ url('admin/user-list') }}" class="btn btn-info">Back to User List</a>

        </div>

    </div>
    <!--Row-->

</x-dashboard-layout>

<!-- Bootstrap Datepicker -->
<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable(); // ID From dataTable
    });
</script>