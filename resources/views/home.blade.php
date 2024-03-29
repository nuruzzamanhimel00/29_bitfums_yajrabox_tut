@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-bordered data-table" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>

                                    <th>intro</th>
                                    <th>Role name</th>
                                    <th>Email</th>
                                    <th>Create at</th>
                                    <th>Update at</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    {{-- //button  --}}
    <link href='https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>
@endpush

@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    {{-- //button --}}
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('get.users') }}",
                dom: 'Blfrtip',
                buttons: [
                   {
                       extend: 'pdf',
                       exportOptions: {
                           columns: [1,2,3,4,5,6] // Column index which needs to export
                       }
                   },
                   {
                       extend: 'csv',
                       exportOptions: {
                           columns: [0,5] // Column index which needs to export
                       }
                   },
                   {
                       extend: 'excel',
                   }
              ],
                columns: [{
                        data: 'id',
                        // name: 'id'
                    },
                    {
                        data: 'name',
                        // name: 'name'
                    },
                    {
                        data: 'intro',
                        // name: 'intro'
                    },
                    {
                        data: 'role_name',
                        // name: 'role_name'
                    },
                    {
                        data: 'email',
                        // name: 'email'
                    },
                    {
                        data: 'created_at',
                        // name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        // name: 'updated_at'
                    },
                    {
                        data: 'action',
                        // name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endpush
