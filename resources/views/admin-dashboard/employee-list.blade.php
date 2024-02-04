@extends('layouts.admin_layout')

@section('content')
    <div class="main_content_iner ">
        <div class="box_header ">
            <div class="main-title">
                <h3 class="mb-0">Employees List</h3>
            </div>
        </div>
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="card-body">
                    @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 4.0
                                </td>
                                <td>Win 95+</td>
                                <td> 4</td>
                                <td>X</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            serverSide: true,
            ajax: "{{ route('employees_list') }}", // Replace with your route name
            columns: [
                // Define your columns here
                {data: 'id', name: 'id'},
                {data: 'first_name', name: 'image'},
                {data: 'last_name', name: 'name'},
                {data: 'company', name: 'company'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'action', name: 'action', orderable: false, searchable: false },
                // Add more columns as needed
            ]
        });
    });
</script>

@endsection
