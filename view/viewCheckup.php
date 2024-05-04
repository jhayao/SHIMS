<?php include_once ('include/head.php'); ?>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico"
            alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Preloader -->
    <div class="preloader">
        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico"
            alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <?php include_once ('include/sidebar.php'); ?>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <?php include_once ('include/header.php'); ?>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                    <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">List of Checkups</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a class="text-muted"
                                                href="viewCheckup.php">Checkups</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">List of Checkups</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-3">
                                <div class="text-center mb-n5">
                                    <img src="../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="mb-2">
                            <h5 class="mb-0">List</h5>
                        </div> -->

                        <div class="table-responsive">
                            <table id="file_export"
                                class="table border table-striped table-bordered display text-nowrap">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>ID</th>
                                        <th>Student Name</th>
                                        <th>Cheked By</th>
                                        <th>Height</th>
                                        <th>Temperature</th>
                                        <th>Weight</th>
                                        <th>BMI</th>
                                        <th>Heart Rate</th>
                                        <th>Height for Age</th>
                                        <th>Vision Screening</th>
                                        <th>Auditory Screening</th>
                                        <th>Skin Scalp</th>
                                        <th>Eyes Ear Nose</th>
                                        <th>Mouth Throat Neck</th>
                                        <th>Lungs Heart</th>
                                        <th>Abdomen</th>
                                        <th>Deformities</th>
                                        <th>Immunization</th>
                                        <th>Iron Supplementation</th>
                                        <th>Deworming</th>
                                        <th>SBFP Beneficiary</th>
                                        <th>FourPs Beneficiary</th>
                                        <th>Menarche</th>
                                        <th>Others</th>
                                        <th>Checkup Date</th>
                                        <!-- <th>Findings</th>
                                        <th>Prescription</th> -->
                                        <?php if ($_SESSION['user_type'] == 'admin' || ($_SESSION['user_type'] === 'nurse' && strtolower($_SESSION["userInfo"]["nurse_type"]) === 'school nurse')) { ?>
                                            <th>Options</th>
                                        <?php } ?>
                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <!-- start row -->
                                    <tr>
                                        <th>ID</th>
                                        <th>Student Name</th>
                                        <th>Cheked By</th>
                                        <th>Height</th>
                                        <th>Temperature</th>
                                        <th>Weight</th>
                                        <th>BMI</th>
                                        <th>Heart Rate</th>
                                        <th>Height for Age</th>
                                        <th>Vision Screening</th>
                                        <th>Auditory Screening</th>
                                        <th>Skin Scalp</th>
                                        <th>Eyes Ear Nose</th>
                                        <th>Mouth Throat Neck</th>
                                        <th>Lungs Heart</th>
                                        <th>Abdomen</th>
                                        <th>Deformities</th>
                                        <th>Immunization</th>
                                        <th>Iron Supplementation</th>
                                        <th>Deworming</th>
                                        <th>SBFP Beneficiary</th>
                                        <th>FourPs Beneficiary</th>
                                        <th>Menarche</th>
                                        <th>Others</th>
                                        <th>Checkup Date</th>
                                        <!-- <th>Findings</th>
                                        <th>Prescription</th> -->
                                        <?php if ($_SESSION['user_type'] == 'admin' || ($_SESSION['user_type'] === 'nurse' && strtolower($_SESSION["userInfo"]["nurse_type"]) === 'school nurse')) { ?>
                                            <th>Options</th>
                                        <?php } ?>
                                    </tr>
                                    <!-- end row -->
                                </tfoot>
                                <!-- < -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once ("./include/extra.php"); ?>
    <!--  Customizer -->


    <?php include_once ("./include/scripts.php"); ?>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/select/2.0.0/js/select.dataTables.min.js"></script>
    <script type="text/javascript"
        src=https://cdn.datatables.net/searchpanes/2.1.1/js/dataTables.searchPanes.min.js></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>


    <!-- <script src="../dist/js/datatable/datatable-advanced.init.js"></script> -->
    <!-- Add the following code block before the closing </body> tag -->




    <script>
        //onload
        $(document).ready(function () {

            if (<?php echo (isset($_GET['success']) ? true : 0); ?>) {
                noty.setText("Successfully Added", true);
                noty.show();
            }

            DataTable.ext.buttons.alert = {
                className: 'buttons-alert',

                action: function (e, dt, node, config) {

                }
            };


            //datatable
            var table = $('#file_export').DataTable({
                // dom: 'Bfrtip',
                searchPanes: {
                    viewTotal: true,
                    layout: 'columns-3',
                    columns: [0, 1, 2, 3, 4]
                },
                buttons: [
                    'searchPanes'
                ],
                ajax: {
                    "url": "../controller/checkupController.php",
                    "type": "POST",
                    "data": {
                        "function": "getAllCheckupbySchoolId",
                        "schoolId": "<?php echo $_SESSION['userInfo']['assigned']; ?>"
                    },
                },
                columns: [
                    {
                        "data": "id"
                    },
                    {
                        "data": "studentName"
                    },
                    {
                        "data": "nurseName"
                    },
                    {
                        "data": "height"
                    },
                    {
                        "data": "temperature"
                    },
                    {
                        "data": "weight"
                    },
                    {
                        "data": "BMI",
                        searchable: true
                    },
                    {
                        "data": "heart_rate"
                    },
                    {
                        "data": "height_for_age"
                    },
                    {
                        "data": "vision_screening"
                    },
                    {
                        "data": "auditory_screening"
                    },
                    {
                        "data": "skin_scalp"
                    },
                    {
                        "data": "eyes_ear_nose"
                    },
                    {
                        "data": "mouth_throat_neck"
                    },
                    {
                        "data": "lungs_heart"
                    },
                    {
                        "data": "abdomen"
                    },
                    {
                        "data": "deformities"
                    },
                    {
                        "data": "immunization"
                    },
                    {
                        "data": "iron_supplementation"
                    },
                    {
                        "data": "deworming"
                    },
                    {
                        "data": "sbfp_beneficiary"
                    },
                    {
                        "data": "fourps_beneficiary"
                    },
                    {
                        "data": "menarche"
                    },
                    {
                        "data": "others"
                    },
                    {
                        "data": "created_at"
                    }
                    <?php if ($_SESSION['user_type'] == 'admin' || ($_SESSION['user_type'] === 'nurse' && strtolower($_SESSION["userInfo"]["nurse_type"]) === 'school nurse')) { ?>
                        , {
                            "data": "id",
                            createdCell: function (cell, cellData, rowData, rowIndex, colIndex) {
                                $(cell).on('click', '.delete', function () {
                                    // Handle cell click event
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
                                            //delete reuqest ajax
                                            $.ajax({
                                                url: "../controller/checkupController.php",
                                                type: "POST",
                                                dataType: "json",
                                                data: {
                                                    "function": "deleteCheckup",
                                                    "id": cellData
                                                },
                                                success: function (data) {
                                                    console.log(data);
                                                    if (data.success) {
                                                        Swal.fire(
                                                            'Deleted!',
                                                            'Your file has been deleted.',
                                                            'success'
                                                        ).then((result) => {
                                                            if (result.isConfirmed) {
                                                                location.reload();
                                                            }
                                                        })
                                                    }
                                                }
                                            });
                                        }
                                    })
                                });
                            },
                            "render": function (data, type, row, meta) {
                                return `<div class="d-flex">
                                                    <a href="addCheckup.php?edit=true&id=${data}" class="btn btn-primary me-1"><i class="ti ti-edit"></i></a>
                                                    <button id="${data}" class="btn btn-danger delete me-1"><i class="ti ti-trash-x"></i></button>
                                                </div>`;
                            }
                        }
                    <?php } ?>
                ],
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo($(column.footer()).empty()) // Change $(column.header()) to $(column.footer())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                },
                buttons: [

                ]
            });


            $(".buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel").addClass(
                "btn btn-primary mr-1");

            //delete


        });
    </script>



</body>

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/page-account-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Jul 2023 11:13:35 GMT -->

</html>