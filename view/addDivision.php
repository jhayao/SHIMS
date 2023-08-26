<!DOCTYPE html>
<html lang="en">
<?php isset($_GET['edit']) ? $edit = $_GET['edit'] : $edit = 0; ?>
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
                                <h4 class="fw-semibold mb-8"><?php echo ($edit ? "Edit Division" : "Add Division");?></h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a class="text-muted" href="division.php">Division</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <?php echo ($edit ? "Edit Division" : "Add Division");?></li>
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
                        <div class="row">
                            <!-- <div class="col-lg-12 d-flex align-items-stretch">
                                <div class="card w-100 position-relative overflow-hidden">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-semibold">Change Profile</h5>
                                        <p class="card-subtitle mb-4">Change your profile picture from here</p>
                                        <div class="text-center">
                                            <img src="../dist/images/profile/user-1.jpg" alt=""
                                                class="img-fluid rounded-circle" width="120" height="120">
                                            <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                                                <button class="btn btn-primary">Upload</button>
                                                <button class="btn btn-outline-danger">Reset</button>
                                            </div>
                                            <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-12">
                                <div class="card w-100 position-relative overflow-hidden mb-0">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-semibold">Personal Details</h5>
                                        <p class="card-subtitle mb-4">To change your personal detail , edit and save
                                            from here</p>
                                        <form id="divisionForm" novalidate>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="division_name"
                                                            class="form-label fw-semibold">Division Name</label>
                                                        <input type="text" class="form-control " id="division_name"
                                                            name="division_name" placeholder="Mathew Anderson"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Please enter a Division Name.
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="address"
                                                            class="form-label fw-semibold">Address</label>
                                                        <input type="text" class="form-control" id="address"
                                                            name="address" placeholder="Mathew Anderson"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Please enter an Address.
                                                        </div>
                                                    </div>
                                                    



                                                </div>
                                                
                                                <div class="col-12">
                                                    <div
                                                        class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                        <button
                                                            class="btn btn-primary"><?php echo ($edit ? "Update" : "Save");?></button>
                                                        <button class="btn btn-light-danger text-danger" onclick="window.location.href='viewDivision.php'">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("./include/extra.php");?>
    <!--  Customizer -->
    <?php include_once("./include/scripts.php"); ?>
    <script>
        //onload
        $(document).ready(function () {


            if ( <?php echo(isset($_GET['edit']) ? true : 0); ?> ) {
                //request ajax to get data of division by id

                $.ajax({
                    url: "../controller/divisionController.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        function: "editDivision",
                        id: <?php echo(isset($_GET['id']) ? $_GET['id'] : 0); ?>
                    },
                    success: function (data) {
                        //set all inputs from return data


                        //set all inputs from return data
                        $('#division_name').val(data.division_name);
                        $('#address').val(data.address);
                    }
                })
            }



            var divisionForm = document.getElementById('divisionForm');
            var divisionFormValidation = Array.prototype.filter.call(divisionForm, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });

            $('#divisionForm').submit(function (event) {
                event.preventDefault();
                var form = $(this);
                if (form[0].checkValidity() === false) {
                    event.stopPropagation();
                } else {
                    // Submit the form
                    var formdata = new FormData(this);
                    if( <?php echo($edit);?>)
                    {
                        formdata.append("function", "updateDivision");
                        formdata.append("id", <?php echo(isset($_GET['id']) ? $_GET['id'] : 0); ?>);
                    }
                    else {
                        formdata.append("function", "addDivision");
                    }
                    
                    $.ajax({
                        url: "../controller/divisionController.php",
                        type: "POST",
                        data: formdata,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            console.log(data);
                            //trim data
                            data = data.trim();
                            console.log(data)
                            if (data == "success") {
                                window.location.href = "viewDivision.php?success=1";
                            } else {
                                noty.setText("Error", true);
                                noty.setType("error");
                                noty.show();
                            }

                        },
                        error: function (data) {
                            data = data.trim();
                            console.log(data);
                            noty.setText("Error", true);
                            noty.setType("error");
                            noty.show();
                        }
                    });
                }
                form.addClass('was-validated');
            });



        });
    </script>
</body>

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/page-account-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Jul 2023 11:13:35 GMT -->

</html>