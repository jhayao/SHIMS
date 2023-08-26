<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/page-account-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Jul 2023 11:13:34 GMT -->
<?php include_once('include/head.php'); ?>

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
        <?php include_once('include/sidebar.php'); ?>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <?php include_once('include/header.php'); ?>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                    <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8">List of Checkups</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a class="text-muted" href="viewCheckup.php">Checkups</a>
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
                        <div class="mb-2">
                            <h5 class="mb-0">List</h5>
                        </div>

                        <div class="table-responsive">
                            <table id="file_export"
                                class="table border table-striped table-bordered display text-nowrap">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>ID</th>
                                        <th>Division Name</th>
                                        <th>Address</th>
                                        <th>Options</th>
                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody>

                                </tbody>
                                <!-- < -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("./include/extra.php");?>
    <!--  Customizer -->

    
    <?php include_once("./include/scripts.php"); ?>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <!-- <script src="../../../../../../../cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script> -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <!-- <script src="../dist/js/datatable/datatable-advanced.init.js"></script> -->
<!-- Add the following code block before the closing </body> tag -->

    

   
    <script>
        //onload
        $(document).ready(function () {

            if(<?php echo (isset($_GET['success']) ? true : 0); ?> ){
                noty.setText("Successfully Added",true);
                noty.show();
            }
            
            //datatable
            var table = $('#file_export').DataTable({
                dom: 'Bfrtip',
                buttons: ["copy", "pdf", "print"],
                ajax: {
                    "url": "../controller/checkupController.php",
                    "type": "POST",
                    "data": {
                        "function": "getAllCheckup"
                    },
                },
                columns: [{
                        "data": "id"
                    },
                   
                    {
                        "data": "studentName"
                    },
                    
                    {
                        "data": "nurseName"
                    },
                    {
                        "data": "id",
                        createdCell: function(cell, cellData, rowData, rowIndex, colIndex) {
                            
                            $(cell).on('click', '.delete', function() {
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
                                            url: "../controller/divisionController.php",
                                            type: "POST",
                                            data: {
                                                "function": "deleteDivision",
                                                "id": cellData
                                            },
                                            success: function (data) {
                                                if(data.trim() == "success"){
                                                    Swal.fire(
                                                        'Deleted!',
                                                        'Your file has been deleted.',
                                                        'success'
                                                        ).then((result) => {
                                                            if(result.isConfirmed){
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
                                        
                                        <a href="addDivision.php?edit=true&id=${data}" class="btn btn-primary   me-1"><i class="ti ti-edit"></i></a>
                                        <button id="${data}"  class="btn btn-danger delete  me-1"><i class="ti ti-trash-x"></i></button>
                                    </div>`;
                        }
                    }
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