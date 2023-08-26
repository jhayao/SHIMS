<!DOCTYPE html>
<html lang="en">
<?php isset($_GET['edit']) ? $edit = $_GET['edit'] : $edit = 0; ?>
<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/page-account-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Jul 2023 11:13:34 GMT -->
<?php include_once('include/head.php'); ?>
<link rel="stylesheet" href="../dist/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
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
                                <h4 class="fw-semibold mb-8"><?php echo ($edit ? "Edit Student" : "Add Student");?></h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a class="text-muted" href="viewStudent.php">Student</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <?php echo ($edit ? "Edit Student" : "Add Student");?></li>
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
                                        <form id="studentForm" novalidate>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="firstname"
                                                            class="form-label fw-semibold">First Name</label>
                                                        <input type="text" class="form-control " id="firstname"
                                                            name="firstname" placeholder="Mathew Anderson"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Please enter a First Name.
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="middlename"
                                                            class="form-label fw-semibold">Middle Name</label>
                                                        <input type="text" class="form-control" id="middlename"
                                                            name="middlename" placeholder="Mathew Anderson"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Please enter a Middle Name.
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="lastname" class="form-label fw-semibold">Last
                                                            Name</label>
                                                        <input type="text" class="form-control" id="lastname"
                                                            name="lastname" placeholder="Mathew Anderson"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Please enter a Last Name.
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="dob"
                                                            class="form-label fw-semibold">Birthday</label>
                                                            <div class="input-group">
                                                            <input type="text" class="form-control mydatepicker" id ="dob" name="dob" placeholder="mm/dd/yyyy" />

                                                            <span class="input-group-text">
                                                                <i class="ti ti-calendar fs-5"></i>
                                                            </span>
                                                            </div>
                                                        <div class="invalid-feedback">
                                                            Please enter a Birthday.
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="guardian" class="form-label fw-semibold">Guardian Name</label>
                                                        <input type="text" class="form-control" id="guardian"
                                                            name="guardian" placeholder="Mathew Anderson"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Please enter a Guardian Name.
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="email"
                                                            class="form-label fw-semibold">Email</label>
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" placeholder="info@modernize.com"
                                                            required>
                                                        <div class="invalid-feedback">
                                                            Please enter a valid Email.
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="contact"
                                                            class="form-label fw-semibold">Phone</label>
                                                        <input type="text" class="form-control" id="contact"
                                                            name="contact" placeholder="+91 12345 65478" required>
                                                        <div class="invalid-feedback">
                                                            Please enter a valid Phone.
                                                        </div>
                                                    </div>

                                                    <div class="mb-4">
                                                        <label for="sex"
                                                            class="form-label fw-semibold">Sex</label>
                                                        <select class="select2 form-control"
                                                            aria-label="Default select example" id="sex" required
                                                            name="sex">
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
                                                        <label for="street"
                                                            class="form-label fw-semibold">Street</label>
                                                        <input type="text" class="form-control" id="street"
                                                            name="street"
                                                            placeholder="814 Howard Street, 120065, India" required>
                                                        <div class="invalid-feedback">
                                                            Please enter a valid Street
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="barangay"
                                                            class="form-label fw-semibold">Barangay</label>
                                                        <input type="text" class="form-control" id="barangay"
                                                            name="barangay"
                                                            placeholder="814 Howard Street, 120065, India" required>
                                                        <div class="invalid-feedback">
                                                            Please enter a valid Barangay
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="city"
                                                            class="form-label fw-semibold">City</label>
                                                        <select class="select2 form-control"
                                                            aria-label="Default select example" id="city"
                                                            name="city">
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
                                                        <label for="province"
                                                            class="form-label fw-semibold">Province</label>
                                                        <select class="select2 form-control"
                                                            aria-label="Default select example" id="province"
                                                            name="province">
                                                            <!-- City of Misamis Occidenta-->
                                                            <!-- <option >Tangub</option> -->
                                                            <option selected value="Misamis Occidental">Misamis
                                                                Occidental</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="postal"
                                                            class="form-label fw-semibold">Postal</label>
                                                        <input type="text" class="form-control" id="postal"
                                                            name="postal"
                                                            placeholder="814 Howard Street, 120065, India" required>
                                                        <div class="invalid-feedback">
                                                            Please enter a valid Postal
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="type" class="form-label fw-semibold">School Name</label>
                                                        <select class="select2 form-control"
                                                            aria-label="Default select example" id="type"
                                                            name="type">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div
                                                        class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                        <button
                                                            class="btn btn-primary"><?php echo ($edit ? "Update" : "Save");?></button>
                                                        <button class="btn btn-light-danger text-danger" onclick="window.location.href='viewStudent.php'">Cancel</button>
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
    <script src="../dist/libs/moment-js/moment.js"></script>
    <script src="../dist/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        //onload
        $(document).ready(function () {

            //get all school
            $.ajax({
                url: "../controller/schoolController.php",
                type: "POST",
                dataType: "json",
                data: {
                    function: "getAllSchool"
                },
                success: function (data) {
                    console.log(data);
                    data = data.data
                    //set all inputs from return data
                    var select = document.getElementById("type");
                    for (var i = 0; i < data.length; i++) {
                        var option = document.createElement("option");
                        option.text = data[i].school_name;
                        option.value = data[i].id;
                        select.add(option);
                    }
                   //
                }
            })

            if ( <?php echo(isset($_GET['edit']) ? true : 0); ?> ) {
                //request ajax to get data of student by id

                $.ajax({
                    url: "../controller/studentController.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        function: "editStudent",
                        id: <?php echo(isset($_GET['id']) ? $_GET['id'] : 0); ?>
                    },
                    success: function (data) {
                        //set all inputs from return data

                        console.log(data)
                        //set all inputs from return data
                        $('#firstname').val(data.firstname);
                        $('#lastname').val(data.lastname);
                        $('#middlename').val(data.middlename)
                        $('#email').val(data.email);
                        $('#contact').val(data.contact);
                        $('#guardian').val(data.guardian);
                        $('#dob').datepicker('setDate',data.dob);
                        // datepickerElement.datepicker('setDate', '2022-01-01');
                        $('#street').val(data.street);
                        $('#barangay').val(data.barangay);
                        $('#city').val(data.city).trigger('change');
                        $('#postal').val(data.postal);
                        $('#type').val(data.school_id).trigger('change');
                    }
                })
            }



            var studentForm = document.getElementById('studentForm');
            var studentFormValidation = Array.prototype.filter.call(studentForm, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });

            $('#studentForm').submit(function (event) {
                event.preventDefault();
                var form = $(this);
                if (form[0].checkValidity() === false) {
                    event.stopPropagation();
                } else {
                    // Submit the form
                    var formdata = new FormData(this);
                    if( <?php echo($edit);?>)
                    {
                        formdata.append("function", "updateStudent");
                        formdata.append("id", <?php echo(isset($_GET['id']) ? $_GET['id'] : 0); ?>);
                    }
                    else {
                        formdata.append("function", "addStudent");
                    }
                    
                    $.ajax({
                        url: "../controller/studentController.php",
                        type: "POST",
                        data: formdata,
                        contentType: false,
                        processData: false,
                        dataType: "json",   
                        success: function (data) {
                            // console.log(data);
                            //trim data
                            // data = data.trim();
                            console.log(data)
                            
                            // const myArray = data.split(":");
                            
                            // console.log(error)


                            if (data.success == 'true') {
                                window.location.href = "viewStudent.php?success=1";
                            } else {
                                if (data.errorCode == 1062){
                                    let duplicate = data.errorMessage.split("'");
                                    noty.setText("Error : " + duplicate[1] + " already exist for " + duplicate[3] + " attribute", true);
                                    // noty.setText("Error : Email already exist", true);
                                    noty.setType("error");
                                    noty.show();
                                }
                                else{
                                    noty.setText("Error : " + data.errorCode, true);
                                    noty.setType("error");
                                    noty.show();
                                }
                                
                            }

                        },
                        error: function (data) {
                            // data = data.trim();
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

        jQuery(".mydatepicker, #datepicker, .input-group.date").datepicker({format: "yyyy-mm-dd",});
    </script>
</body>

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/page-account-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Jul 2023 11:13:35 GMT -->

</html>