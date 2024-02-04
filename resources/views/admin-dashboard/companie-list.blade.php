@extends('layouts.admin_layout')

@section('content')


    <div class="main_content_iner ">
        <div class="box_header ">
            <div class="main-title">
                <h3 class="mb-0">Companies List</h3>
            </div>
        </div>
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
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
                        <!-- Define your table headers here -->
                        <th>ID</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Action</th>
                        <!-- Add more headers as needed -->
                    </tr>
                </thead>
            </table>

            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                serverSide: true,
                ajax: "{{ route('companies_list') }}", // Replace with your route name
                columns: [
                    // Define your columns here
                    {data: 'id', name: 'id'},
                    {data: 'image', name: 'image', orderable: false, searchable: false },
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'website', name: 'website'},
                    {data: 'action', name: 'action', orderable: false, searchable: false },
                    // Add more columns as needed
                ]
            });
        });
    </script>
    @endsection