<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD WITH AJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.0/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
    <!-- <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_employee_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="cName" class="form-label">Customer Name</label>
                                <input type="text" name="cName" class="form-control" placeholder="First Name" required>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="company" class="form-label">Company</label>
                                <input type="text" name="company" class="form-control" placeholder="Last Name" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Contact No</label>
                            <input type="tel" name="phone" class="form-control" placeholder="Phone" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                        </div>

                        <div class="mb-3">
                            <label for="post" class="form-label">Country</label>
                            <input type="text" name="post" class="form-control" placeholder="Post" required>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-2">
                                <label for="addNo" class="form-label">No</label>
                                <input type="text" class="form-control addNo" name="addNo" id="addNo" placeholder="No">
                            </div>
                            <div class="col-md-4">
                                <label for="street" class="form-label">Street</label>
                                <input type="text" class="form-control street" name="street" id="street" placeholder="Street">
                            </div>
                            <div class="col-md-4">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control city" name="city" id="city" placeholder="City">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-primary w-100" id="addBtn">ADD</button>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Street</th>
                                                    <th>City</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="addTable"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button data-bs-toggle="modal" data-bs-target="#editEmployeeModal" type="submit" id="add_employee_btn" class="btn btn-primary">Add Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->

    {{-- add new employee modal end --}}

    {{-- edit employee modal start --}}
    <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Change modal size to large -->
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" id="edit_employee_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="emp_id" id="emp_id">
                    <input type="hidden" name="emp_avatar" id="emp_avatar">
                    <div class="modal-body p-4 bg-light">
                        <div class="row mb-3">
                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="cName" class="form-label">Customer Name</label>
                                <input type="text" name="cName" id="cName" class="requiredbox form-control" placeholder="Customer Name" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <label for="company" class="form-label">Company</label>
                                <input type="text" name="company" id="company" class="requiredbox form-control" placeholder="Company" required>
                            </div>
                        </div>

                        <div class="my-2">
                            <label for="phone" class="form-label">Contact No</label>
                            <input type="tel" name="phone" id="phone" class="requiredbox form-control" placeholder="Phone" required>
                        </div>
                        <div class="my-2">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" id="email" class="requiredbox form-control" placeholder="E-mail" required>
                        </div>
                        <div class="my-2">
                            <label for="post" class="form-label">Country</label>
                            <input type="text" name="post" id="post" class="requiredbox form-control" placeholder="Post" required>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-2">
                                <label for="addNo" class="form-label">No</label>
                                <input type="text" class="form-control addNo" name="addNo" id="addNo" placeholder="No">
                            </div>
                            <div class="col-md-4">
                                <label for="street" class="form-label">Street</label>
                                <input type="text" class="form-control street" name="street" id="street" placeholder="Street">
                            </div>
                            <div class="col-md-4">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control city" name="city" id="city" placeholder="City">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-primary w-100" id="addBtn1">ADD</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Street</th>
                                                <th>City</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="addTable1"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="add_employee_btn" class="btn btn-primary">Add Customer</button>
                        <button style="display:none;" type="button" id="edit_employee_btn" class="btn btn-success">Update Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- edit employee modal end --}}

    <body class="bg-light">
        <div class="container">
            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-header bg-danger d-flex justify-content-between align-items-center">
                            <h3 class="text-light">Customer List</h3>
                            <button class="btn btn-light modalOpen" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="bi-plus-circle me-2"></i>Add New Employee</button>
                        </div>
                        <div class="card-body" id="show_all_employees">
                            <h1 class="text-center text-secondary my-5">Loading...</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/v/dt/dt-2.0.0/datatables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            fetchAll()

            function fetchAll() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('fetchAll') }}",
                    success: function(res) {
                        $('#show_all_employees').html(res);
                        $('.tableDat').DataTable({
                            order: [
                                [0, 'desc']
                            ], // Ensure the order is set correctly
                            destroy: true // Allows reinitialization
                        });
                    }
                });
            }


            $(document).on('click', '#add_employee_btn', function(e) {
                e.preventDefault();

                // Using FormData to gather form data
                const formData = new FormData($('#edit_employee_form')[0]);

                $('#add_employee_btn').text('Adding...');
                checkRequired();
                var errorCount = $('.error_msg').length;
                if (errorCount == 0) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('store') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        cache: false,
                        success: function(response) {
                            if (response.status == 200) {
                                swal.fire(
                                    'Added',
                                    'Employee added successfully',
                                    'success'
                                )
                                $('#add_employee_btn').text('Add Customer');
                                // $('#addEmployeeModal').modal('hide')
                                location.reload()
                                // fetchAll()
                            }


                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }

            });

            $(document).on('click', '.editIcon', function() {
                var editId = $(this).attr('id');

                $.ajax({
                    type: "GET",
                    url: "{{ route('edit') }}",
                    data: {
                        id: editId,
                        '_token': '{{csrf_token()}}'
                    },
                    success: function(res) {
                        $('#add_employee_btn').hide()
                        $('#edit_employee_btn').show()
                        $('#edit_employee').hide()
                        $('#cName').val(res.emps.cus_name);
                        $('#company').val(res.emps.company);
                        $('#email').val(res.emps.email);
                        $('#phone').val(res.emps.phone);
                        $('#post').val(res.emps.post);
                        $('#emp_id').val(res.emps.id);
                        res.address.forEach(function(item) {
                            $('#addTable1').append(`
        <tr class="delRow">
            <td>${item.address_no} <input type="hidden" name="addNo1[]" class="addNo1" value="${item.address_no}"><input type="hidden" name="addId[]" class="addId" value="${item.id}"></td>
            <td>${item.street} <input type="hidden" name="street1[]" class="street1" value="${item.street}"></td>
            <td>${item.city} <input type="hidden" name="city1[]" class="city1" value="${item.city}"></td>
            <td><i class="bi-trash delAdd"></i></td>
        </tr>
    `);
                        });


                    }
                });

            });

            $(document).on('click', '#edit_employee_btn', function(e) {
                e.preventDefault();

                // Using FormData to gather form data
                const formData = new FormData($('#edit_employee_form')[0]);

                $('#edit_employee_btn').text('Adding...');
                checkRequired();
                var errorCount = $('.error_msg').length;
                if (errorCount == 0) {
                    $.ajax({
                        type: "POST",
                        url: "{{route('update')}}", // Specify the URL directly if not using blade template
                        data: formData,
                        contentType: false,
                        processData: false,
                        cache: false,
                        success: function(response) {
                            if (response.status == 200) {
                                swal.fire(
                                    'Added',
                                    'Employee added successfully',
                                    'success'
                                )
                                $('#edit_employee_btn').text('Add Customer');
                                // $('#editEmployeeModal').modal('hide')
                                location.reload()

                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
            $(document).on('click', '.deleteIcon', function() {
                var delId = $(this).attr('id');

                // Show SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Proceed with deletion if user confirms
                        $.ajax({
                            type: "POST",
                            url: "{{route('delete')}}",
                            data: {
                                id: delId,
                                '_token': '{{csrf_token()}}'
                            },
                            success: function(res) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your data has been deleted.',
                                    'success'
                                );
                                fetchAll();
                            },
                            error: function() {
                                Swal.fire(
                                    'Error!',
                                    'There was an issue deleting your data.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });



            $(document).on('click', '#addBtn1', function() {
                var addNo = $('.addNo').val()
                var street = $('.street').val()
                var city = $('.city').val()
                if (street != '' && street != '' && city != '') {
                    $('#addTable1').append(`
                    <tr class="delRow">
                        <td>` + addNo + ` <input type="hidden" name="addNo1[]" class="addNo1" value="` + addNo + `"></td>
                         <td>` + street + ` <input type="hidden" name="street1[]" class="street1" value="` + street + `"></td>
                        <td>` + city + ` <input type="hidden" name="city1[]" class="city1" value="` + city + `"></td>
                        <td><i class="bi-trash delAdd"></i></td>
                    </tr>
                `)
                } else {
                    Swal.fire({
                        title: 'Oops!',
                        text: 'Please fill all address related fields',
                        icon: 'warning'
                    });

                }

                $('.addNo').val('')
                $('.street').val('')
                $('.city').val('')
                $('.addNo').focus()


            });

            $(document).on('click', '.delAdd', function() {
                $(this).parent().parent().remove();
            });

            $(document).on('click', '.modalOpen', function() {
                $('#add_employee_btn').show()
                $('#edit_employee_btn').hide()
                $('#addTable1').html('')
                $('.addNo').val('')
                $('.street').val('')
                $('.city').val('')

                $('#cName').val('');
                $('#company').val('');
                $('#email').val('');
                $('#phone').val('');
                $('#post').val('');
                $('#emp_id').val('');

            });

            function checkRequired() {
                $('.requiredbox').each(function() {
                    var requiredValue = $(this).val();

                    if (requiredValue == '' || requiredValue === null) {
                        $(this).css('border', '1px solid red');
                        $(this).parent().find('.error_msg').remove();
                        $(this).after('<span class="error_msg" style="color:red;">This field is required.</span>');
                    } else {
                        $(this).parent().find('.error_msg').remove();
                        $(this).css('border', '1px solid green');
                    }
                });
            }

            $(document).on('keyup', '.requiredbox', function() {
                $(this).parent().find('.error_msg').remove();
                $(this).css('border', '1px solid green');

            });

            $(document).ready(function() {
                // Initialize DataTable
                var table = $('#employeesTable').DataTable({
                    "paging": true,
                    "ordering": true,
                    "info": true,
                    "searching": true,
                    "order": [
                        [0, 'asc']
                    ], // Default order by ID
                    "rowGroup": {
                        dataSrc: 0 // Group by ID if you want to keep address rows together
                    }
                });

                // Optional: You can add custom search functionality if needed
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var mainRow = $(table.row(dataIndex).node());
                        return mainRow.hasClass('address-row') ? true : true;
                    }
                );
            });

            $(document).ready(function() {
    $('#employeesTable').DataTable({
        "paging": true,   // Enable pagination
        "ordering": true, // Enable column sorting
        "info": true,     // Show table info (e.g., entries count)
        "searching": true // Enable search
    });
});

        </script>
    </body>

</html>