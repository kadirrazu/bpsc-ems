@php

    $users = \App\Models\User::all();

@endphp

<x-dashboard-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List of All Users</h1>
    </div>

    <div class="row mb-3">
    
        <div class="col-xl-12 col-md-12">

            <x-flash/>

            <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Sr.</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action Buttons</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Sr.</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action Buttons</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php $count = 1; ?>
                      @foreach( $users as $user )
                      <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->title }}</td>
                        <td>{{ $user->status === 1 ? 'Active' : "Inactive" }}</td>
                        <td>
                            <a href="{{ url('admin/user-details/' . $user->id ) }}" class="btn btn-info">View</a>
                            <a href="{{ url('admin/user-edit/' . $user->id ) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ url('admin/user-delete/' . $user->id ) }}" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                      <?php $count++; ?>
                      @endforeach
                    </tbody>
                </table>
            </div>

            <a href="{{ url('admin/dashboard') }}" class="btn btn-primary">Back to Dashbord</a>

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