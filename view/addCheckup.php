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
                                <h4 class="fw-semibold mb-8"><?php echo ($edit ? "Edit Checkup" : "Add Checkup");?></h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a class="text-muted" href="checkup.php">Checkup</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <?php echo ($edit ? "Edit Checkup" : "Add Checkup");?></li>
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
                                        <form id="checkupForm" novalidate>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="division_id"
                                                            class="form-label fw-semibold">Division Name</label>
                                                        <select class="select2 form-control"
                                                            aria-label="Default select example" id="division_id" required
                                                            name="division_id">
                                                        </select>
                                                        <div class="invalid-feedback">
                                                        Division Name
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="district_id"
                                                            class="form-label fw-semibold">District Name</label>
                                                        <select class="select2 form-control"
                                                            aria-label="Default select example" id="district_id" required
                                                            name="district_id">
                                                        </select>
                                                        <div class="invalid-feedback">
                                                        District Name
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="school_id"
                                                            class="form-label fw-semibold">School Name</label>
                                                        <select class="select2 form-control"
                                                            aria-label="Default select example" id="school_id" required
                                                            name="school_id">
                                                        </select>
                                                        <div class="invalid-feedback">
                                                        School Name
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="student_id"
                                                            class="form-label fw-semibold">Student Name</label>
                                                        <select class="select2 form-control"
                                                            aria-label="Default select example" id="student_id" required
                                                            name="student_id">
                                                        </select>
                                                        <div class="invalid-feedback">
                                                        Student Name
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="height"
                                                            class="form-label fw-semibold">Height</label>
                                                        <input type="text" class="form-control" id="height"
                                                            name="height" placeholder="Height"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Please enter an Height.
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="weight"
                                                            class="form-label fw-semibold">Weight</label>
                                                        <input type="text" class="form-control" id="weight"
                                                            name="weight" placeholder="Weight"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Please enter an Weight.
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="temperature"
                                                            class="form-label fw-semibold">Temperature</label>
                                                        <input type="text" class="form-control" id="temperature"
                                                            name="temperature" placeholder="Temperature"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Please enter an Temperature.
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                <div class="col-12">
                                                    <div
                                                        class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                        <button
                                                            class="btn btn-primary"><?php echo ($edit ? "Update" : "Save");?></button>
                                                        <button class="btn btn-light-danger text-danger" onclick="window.location.href='viewCheckup.php'">Cancel</button>
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
                //request ajax to get data of Checkupby id

                $.ajax({
                    url: "../controller/checkupController.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        function: "editCheckup",
                        id: <?php echo(isset($_GET['id']) ? $_GET['id'] : 0); ?>
                    },
                    success: function (data) {
                        $('#checkup_name').val(data.checkup_name);
                        $('#address').val(data.address);
                    }
                })
            }


            //request ajax to get all division
            $.ajax({
                url: "../controller/divisionController.php",
                type: "POST",
                dataType: "json",
                data: {
                    function: "getAllDivision"
                },
                success: function (data) {
                    //set all inputs from return data
                    var division_id = $('#division_id');
                    division_id.empty();
                    division_id.append('<option value="" selected disabled>Select Division</option>');
                    data = data.data
                    $.each(data, function (index, value) {
                        console.log(value)
                        division_id.append('<option value="' + value.id + '">' + value.division_name +
                            '</option>');
                    });
                    if ( <?php echo($edit);?> ) {
                        division_id.val(<?php echo(isset($_GET['division_id']) ? $_GET['division_id'] : 0); ?>);
                    }
                }
            })

           
            //select2 division_id on change
            $('#division_id').on('change', function () {
                var district_id = $('#district_id');
                district_id.empty().trigger("change");
                var division_id = $(this).val();
                //request ajax to get all district by division_id
                $.ajax({
                    url: "../controller/districtController.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        function: "getDistrictsByDivisionName",
                        division_id: division_id
                    },
                    success: function (data) {
                        //set all inputs from return data
                        data = data.data
                        var district_id = $('#district_id');
                        district_id.empty();
                        district_id.append('<option value="" selected disabled>Select District</option>');
                        $.each(data, function (index, value) {
                            district_id.append('<option value="' + value.id + '">' + value.district_name +
                                '</option>');
                        });
                    }
                })
            })

            //district_id on change and call schoolController
            $('#district_id').on('change', function () {
                let school_id = $('#school_id');
                school_id.empty();
                //request ajax to get all school
                $.ajax({
                    url: "../controller/schoolController.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        function: "getSchoolbyDistrictId",
                        district_id: $(this).val()
                    },
                    success: function (data) {
                        data = data.data
                        //set all inputs from return data
                        
                        school_id.empty();
                        school_id.append('<option value="" selected disabled>Select School</option>');
                        $.each(data, function (index, value) {
                            school_id.append('<option value="' + value.id + '">' + value.school_name +
                                '</option>');
                        });
                        if ( <?php echo($edit);?> ) {
                            school_id.val(<?php echo(isset($_GET['school_id']) ? $_GET['school_id'] : 0); ?>);
                        }
                    }
                })
            })

            //get all student when school change
            $('#school_id').on('change', function () {
                var student_id = $('#student_id');
                student_id.empty();
                //request ajax to get all student
                $.ajax({
                    url: "../controller/studentController.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        function: "getStudentbySchoolId",
                        school_id: $(this).val()
                    },
                    success: function (data) {
                        data = data.data
                        console.log(data)
                        //set all inputs from return data
                        
                        student_id.empty();
                        student_id.append('<option value="" selected disabled>Select Student</option>');
                        $.each(data, function (index, value) {
                            student_name = value.firstname + ' ' + value.lastname;
                            student_id.append('<option value="' + value.id + '">' + student_name +
                                '</option>');
                        });
                        if ( <?php echo($edit);?> ) {
                            student_id.val(<?php echo(isset($_GET['student_id']) ? $_GET['student_id'] : 0); ?>);
                        }
                    }
                })
            })
            

            


            var checkupForm = document.getElementById('checkupForm');
            var checkupFormValidation = Array.prototype.filter.call(checkupForm, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });

            $('#checkupForm').submit(function (event) {
                event.preventDefault();
                var form = $(this);
                if (form[0].checkValidity() === false) {
                    event.stopPropagation();
                } else {
                    // Submit the form
                    var formdata = new FormData(this);
                    if( <?php echo($edit);?>)
                    {
                        formdata.append("function", "updateCheckup");
                        formdata.append("id", <?php echo(isset($_GET['id']) ? $_GET['id'] : 0); ?>);
                    }
                    else {
                        formdata.append("function", "addCheckup");
                    }
                    
                    $.ajax({
                        url: "../controller/checkupController.php",
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
                                window.location.href = "viewCheckup.php?success=1";
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