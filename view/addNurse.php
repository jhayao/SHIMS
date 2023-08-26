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
                                <h4 class="fw-semibold mb-8"><?php echo ($edit ? "Edit Nurse" : "Add Nurse");?></h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a class="text-muted" href="viewNurse.php">Nurse</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <?php echo ($edit ? "Edit Nurse" : "Add Nurse");?></li>
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
                                        <form id="nurseForm" novalidate>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="nurse_firstname"
                                                            class="form-label fw-semibold">First Name</label>
                                                        <input type="text" class="form-control " id="nurse_firstname"
                                                            name="nurse_firstname" placeholder="Mathew Anderson"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Please enter a First Name.
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="nurse_middlename"
                                                            class="form-label fw-semibold">Middle Name</label>
                                                        <input type="text" class="form-control" id="nurse_middlename"
                                                            name="nurse_middlename" placeholder="Mathew Anderson"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Please enter a Middle Name.
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="nurse_lastname" class="form-label fw-semibold">Last
                                                            Name</label>
                                                        <input type="text" class="form-control" id="nurse_lastname"
                                                            name="nurse_lastname" placeholder="Mathew Anderson"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Please enter a Last Name.
                                                        </div>
                                                    </div>



                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="nurse_email"
                                                            class="form-label fw-semibold">Email</label>
                                                        <input type="email" class="form-control" id="nurse_email"
                                                            name="nurse_email" placeholder="info@modernize.com"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Please enter a valid Email.
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="nurse_contact"
                                                            class="form-label fw-semibold">Phone</label>
                                                        <input type="text" class="form-control" id="nurse_contact"
                                                            name="nurse_contact" placeholder="+91 12345 65478" required>
                                                        <div class="invalid-feedback">
                                                            Please enter a valid Phone.
                                                        </div>
                                                    </div>

                                                    <div class="mb-4">
                                                        <label for="nurse_sex"
                                                            class="form-label fw-semibold">Sex</label>
                                                        <select class="select2 form-control"
                                                            aria-label="Default select example" id="nurse_sex" required
                                                            name="nurse_sex">
                                                            <option selected>Male</option>
                                                            <option value="1">Female</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please enter a valid gender
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="nurse_street"
                                                            class="form-label fw-semibold">Street</label>
                                                        <input type="text" class="form-control" id="nurse_street"
                                                            name="nurse_street"
                                                            placeholder="814 Howard Street, 120065, India" required>
                                                        <div class="invalid-feedback">
                                                            Please enter a valid Street
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="nurse_barangay"
                                                            class="form-label fw-semibold">Barangay</label>
                                                        <input type="text" class="form-control" id="nurse_barangay"
                                                            name="nurse_barangay"
                                                            placeholder="814 Howard Street, 120065, India" required>
                                                        <div class="invalid-feedback">
                                                            Please enter a valid Barangay
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="nurse_city"
                                                            class="form-label fw-semibold">City</label>
                                                        <select class="select2 form-control"
                                                            aria-label="Default select example" id="nurse_city"
                                                            name="nurse_city">
                                                            <!-- City of Misamis Occidenta-->
                                                            <option selected>Tangub</option>
                                                            <optgroup label="Cities">
                                                                <option value="Oroquieta">Oroquieta</option>
                                                                <option value="Ozamiz">Ozamiz</option>
                                                                <option value="Tangub">Tangub</option>
                                                            </optgroup>
                                                            <optgroup label="Municipalities">
                                                                <option value="Aloran">Aloran</option>
                                                                <option value="Baliangao">Baliangao</option>
                                                                <option value="Bonifacio">Bonifacio</option>
                                                                <option value="Calamba">Calamba</option>
                                                                <option value="Clarin">Clarin</option>
                                                                <option value="Concepcion">Concepcion</option>
                                                                <option value="Don Victoriano Chiongbian">Don Victoriano
                                                                    Chiongbian</option>
                                                                <option value="Jimenez">Jimenez</option>
                                                                <option value="Lopez Jaena">Lopez Jaena</option>
                                                                <option value="Panaon">Panaon</option>
                                                                <option value="Plaridel">Plaridel</option>
                                                                <option value="Sapang Dalaga">Sapang Dalaga</option>
                                                                <option value="Sinacaban">Sinacaban</option>
                                                                <option value="Tudela">Tudela</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="nurse_province"
                                                            class="form-label fw-semibold">Province</label>
                                                        <select class="select2 form-control"
                                                            aria-label="Default select example" id="nurse_province"
                                                            name="nurse_province">
                                                            <!-- City of Misamis Occidenta-->
                                                            <!-- <option >Tangub</option> -->
                                                            <option selected value="Misamis Occidental">Misamis
                                                                Occidental</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="nurse_postal"
                                                            class="form-label fw-semibold">Postal</label>
                                                        <input type="text" class="form-control" id="nurse_postal"
                                                            name="nurse_postal"
                                                            placeholder="814 Howard Street, 120065, India" required>
                                                        <div class="invalid-feedback">
                                                            Please enter a valid Postal
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="nurse_type" class="form-label fw-semibold">Nurse
                                                            Type</label>
                                                        <select class="select2 form-control"
                                                            aria-label="Default select example" id="nurse_type"
                                                            name="nurse_type">
                                                            <!-- City of Misamis Occidenta-->
                                                            <!-- <option >Tangub</option> -->
                                                            <option selected value="School Nurse">School Nurse</option>
                                                            <optgroup label="Nurse Type">
                                                                <option value="School Nurse">School Nurse</option>
                                                                <option value="District Nurse">District Nurse</option>
                                                                <option value="Division Nurse">Division Nurse</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="">
                                                        <label for="assigned" class="form-label fw-semibold">Nurse
                                                                Assigned</label>
                                                            <select class="select2 form-control"
                                                                aria-label="Default select example" id="assigned"
                                                                name="assigned">
                                                                
                                                                </optgroup>
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div
                                                        class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                        <button
                                                            class="btn btn-primary"><?php echo ($edit ? "Update" : "Save");?></button>
                                                        <button class="btn btn-light-danger text-danger" onclick="window.location.href='viewNurse.php'">Cancel</button>
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


            //type on change
            $('#nurse_type').on('change', function () {
                var type = $(this).val();
                console.log(type)
                $('#assigned').empty();
                if (type == "Division Nurse") {
                    //request ajax to get all school Nurse from divisionController
                    $.ajax({
                        url: "../controller/divisionController.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            function: "getAllDivision"
                        },
                        success: function (data) {
                            data = data.data
                            //populate assigned select with school divisions
                            var options = '<option value="">Select Divison</option>';
                            $.each(data, function (key, value) {
                                options += '<option value="' + value.id + '">' + value.division_name + '</option>';
                            });
                            $('#assigned').html(options);
                        }
                    });


                } else if (type == "District Nurse") {
                    $.ajax({
                        url: "../controller/districtController.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            function: "getAllDistrict"
                        },
                        success: function (data) {
                            data = data.data
                            //populate assigned select with districts
                            var options = '<option value="">Select District</option>';
                            $.each(data, function (key, value) {
                                options += '<option value="' + value.id + '">' + value.district_name + '</option>';
                            });
                            $('#assigned').html(options);
                        }
                    });
                    
                    
                } else if (type == "School Nurse") {
                    $.ajax({
                        url: "../controller/schoolController.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            function: "getAllSchool"
                        },
                        success: function (data) {
                            data = data.data
                            //populate assigned select with schools
                            var options = '<option value="">Select School</option>';
                            $.each(data, function (key, value) {
                                options += '<option value="' + value.id + '">' + value.school_name + '</option>';
                            });
                            $('#assigned').html(options);
                        }
                    });
                }
            });
            $('#assigned').trigger('change');

            if ( <?php echo(isset($_GET['edit']) ? true : 0); ?> ) {
                //request ajax to get data of nurse by id

                $.ajax({
                    url: "../controller/nurseController.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        function: "editNurse",
                        id: <?php echo(isset($_GET['id']) ? $_GET['id'] : 0); ?>
                    },
                    success: function (data) {
                        //set all inputs from return data


                        //set all inputs from return data
                        $('#nurse_firstname').val(data.firstname);
                        $('#nurse_lastname').val(data.lastname);
                        $('#nurse_middlename').val(data.middlename)
                        $('#nurse_email').val(data.email);
                        $('#nurse_contact').val(data.contact);
                        $('#nurse_street').val(data.street);
                        $('#nurse_barangay').val(data.barangay);
                        $('#nurse_city').val(data.city).trigger('change');
                        $('#nurse_postal').val(data.postal);
                        $('#nurse_type').val(data.nurse_type).trigger('change');
                    }
                })
            }



            var nurseForm = document.getElementById('nurseForm');
            var nurseFormValidation = Array.prototype.filter.call(nurseForm, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });

            $('#nurseForm').submit(function (event) {
                event.preventDefault();
                var form = $(this);
                if (form[0].checkValidity() === false) {
                    event.stopPropagation();
                } else {
                    // Submit the form
                    var formdata = new FormData(this);
                    if( <?php echo($edit);?>)
                    {
                        formdata.append("function", "updateNurse");
                        formdata.append("id", <?php echo(isset($_GET['id']) ? $_GET['id'] : 0); ?>);
                    }
                    else {
                        formdata.append("function", "addNurse");
                    }
                    
                    $.ajax({
                        url: "../controller/nurseController.php",
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
                                window.location.href = "viewNurse.php?success=1";
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