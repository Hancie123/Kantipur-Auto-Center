@include('layouts.adminnav')
@push('title')
<title>Kantipur Auto Center | Create Customer Accounts</title>

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<div class="main-panel">
    <div class="content-wrapper">
        <h3><b>Customer List</b></h3><br>

        @if(Session::has('success'))
        <script>
        swal("Success!", "{{ Session::get('success') }}", "success");
        </script>
        @endif

        @if(Session::has('fail'))
        <script>
        swal("Fail!", "{{ Session::get('fail') }}", "error");
        </script>
        @endif

        <table class="table table-hover table-striped" id="table_data">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>Address</th>
                    <th>VAT No</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>



        <script>
        $(document).ready(function() {
            var table = $('#table_data').DataTable({
                ajax: {
                    url: '/admin/customer/view',
                    type: 'GET',
                    dataType: 'json', // Set the appropriate data type
                },
                processing: true,
                columns: [{
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'mobile'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: 'vat_no'
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            // Add an edit button for each row
                            return '<a href="javascript:void(0)" onclick="editCustomer(' + row
                                .customer_id + ')" class="btn btn-primary btn-sm">Edit</a>';
                        }
                    }
                ],
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                    'print'
                ]
            });
        });

        function editCustomer(id) {
            $.get('/admin/customer/' + id, function(data) {
                $('#editModal').modal('show');
                $("#id").val(data.customer_id);
                $("#name").val(data.name);
                $("#email").val(data.email);
                $("#mobile").val(data.mobile);
                $("#address").val(data.address);
                $("#vat").val(data.vat_no);
            });
        }
        </script>



        <!-- Bootstrap Edit Modal -->
        <div class="modal fade" id="editModal" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Update Customer Details</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form id="customerEditForm" method="POST" action="{{url('/admin/customer')}}" class="p-4">
                        @csrf
                        <input type="hidden" id="id" name="id" />
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name<sup class="text-danger fw-bold">*</sup></label>
                                <input class="w3-input w3-border w3-round" name="name" type="text" id="name">
                            </div><br>
                            <div class="col-md-6">
                                <label>Email<sup class="text-danger fw-bold">*</sup></label>
                                <input class="w3-input w3-border w3-round" name="email" type="email" id="email">
                                <span class="text-danger">
                                    @error('email')
                                    {{$message}}
                                    </script>
                                    @enderror
                                </span>
                            </div><br>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Address<sup class="text-danger fw-bold">*</sup></label>
                                <input class="w3-input w3-border w3-round" name="address" type="text" id="address">
                                <span class="text-danger">
                                    @error('address')
                                    {{$message}}
                                    </script>
                                    @enderror
                                </span>
                            </div><br>
                            <div class="col-md-6">
                                <label>Mobile No<sup class="text-danger fw-bold">*</sup></label>
                                <input class="w3-input w3-border w3-round" type="text" name="mobile" id="mobile">
                                <span class="text-danger">
                                    @error('mobile')
                                    {{$message}}
                                    </script>
                                    @enderror
                                </span>
                            </div><br>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label>VAT/PAN No</label>
                                <input class="w3-input w3-border w3-round" type="text" name="vat" id="vat">
                                <span class="text-danger">
                                    @error('vat')
                                    {{$message}}
                                    </script>
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary mb-2">Edit</button><br>

                    </form>
                </div>
            </div>
        </div>










        <style>
        /* Change the background color of the table header */
        #table_data thead {
            background-color: rgb(63, 62, 145);
            color: #fff;
        }

        /* Change the font size and weight of the table header */
        #table_data th {
            font-size: 16px;
            font-weight: bold;
        }

        /* Change the background color and font size of the table rows */
        #table_data tbody tr {
            background-color: #f8f9fa;
            font-size: 14px;
        }

        /* Add hover effect to the table rows */
        #table_data tbody tr:hover {
            background-color: #e2e6ea;
        }

        .dataTables_wrapper .dataTables_filter input {
            font-size: 14px;
            padding: 6px;
            width: 300px;
            border-radius: 5px;
        }

        .dataTables_wrapper .dataTables_filter label {
            font-size: 14px;
            font-weight: bold;
        }

        /* Change the background color of the DataTable buttons */
        .dataTables_wrapper .dt-buttons button {
            background-color: #3f3e91;
            color: white;
        }

        /* Change the background color of the DataTable buttons on hover */
        .dataTables_wrapper .dt-buttons button:hover {
            background-color: #3e8e41;
            color: white;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            color: white;
            background-color: #3f3e91;
            border-color: #007bff;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff;
            background-color: #3e8e41;
            border-color: #0056b3;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: white;
            background-color: #3f3e91;
            border-color: #0056b3;
        }
        </style>




    </div>
</div>
</div>



</body>

</html>