<?php isset($_GET['edit']) ? $edit = $_GET['edit'] : $edit = 0; ?>
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
                                <h4 class="fw-semibold mb-8">Reports</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a class="text-muted"
                                                href="viewReport.php">Reports</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            Report</li>
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
                                                <div class="col">

                                                    <div class="mb-4 col-4 ">
                                                        <label for="report" class="form-label fw-semibold">Report
                                                            Type</label>
                                                        <select class="form-control select2" id="report" name="report"
                                                            required>
                                                            <option value="">Select a Report Type</option>
                                                            <option value="1">Individual Report</option>
                                                            <option value="2">Group Report</option>
                                                            <!-- Add options dynamically here -->
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select a Report Type.
                                                        </div>
                                                    </div>
                                                    <div class="individual" hidden>
                                                        <div class="mb-4">
                                                            <label for="student" class="form-label fw-semibold">Student
                                                                Name</label>
                                                            <select class="form-control select2" id="student"
                                                                name="student" required>
                                                                <option value="">Select a Student</option>
                                                                <!-- Add options dynamically here -->
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a Student Name.
                                                            </div>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label for="checkup_date"
                                                                class="form-label fw-semibold">Checkup Date</label>
                                                            <select class="form-control select2" id="checkup_date"
                                                                name="checkup_date" required disabled>
                                                                <option value="">Select All</option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a Checkup Date.
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <h3>School Details</h3>
                                                    <hr>
                                                    <div class="group">
                                                        <div class="row">
                                                            <div class="mb-4 col-4">
                                                                <label for="division"
                                                                    class="form-label fw-semibold">Division</label>
                                                                <select class="form-control select2" id="division"
                                                                    name="division" required>
                                                                    <option value="">Select a Division</option>

                                                                    <!-- Add options dynamically here -->
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select a Divisio.
                                                                </div>
                                                            </div>
                                                            <div class="mb-4 col-4">
                                                                <label for="district"
                                                                    class="form-label fw-semibold">District</label>
                                                                <select class="form-control select2" id="district"
                                                                    name="district" required>
                                                                    <option value="">Select a Section</option>

                                                                    <!-- Add options dynamically here -->
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select a District.
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 col-4">
                                                                <label for="school"
                                                                    class="form-label fw-semibold">School</label>
                                                                <select class="form-control select2" id="school"
                                                                    name="school" required>
                                                                    <option value="">Select a School</option>

                                                                    <!-- Add options dynamically here -->
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select a School.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            



                                                            <div class="mb-4 col-4">
                                                                <label for="bmi"
                                                                    class="form-label fw-semibold">BMI</label>
                                                                <select class="select2 form-control"
                                                                    aria-label="Default select example" id="bmi"
                                                                    name="bmi" required>
                                                                    <!-- Add options here -->
                                                                    <option value="Normal Weight">Normal Weight</option>
                                                                    <option value="Wasted Underweight">Wasted
                                                                        Underweight
                                                                    </option>
                                                                    <option value="Severely Wasted/Underweight">Severely
                                                                        Wasted/Underweight</option>
                                                                    <option value="Overweight">Overweight</option>
                                                                    <option value="Obese">Obese</option>

                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select a BMI.
                                                                </div>
                                                            </div>
                                                            <div class="mb-4 col-4">
                                                                <label for="height_for_age"
                                                                    class="form-label fw-semibold">Height for
                                                                    Age</label>
                                                                <select class="select2 form-control"
                                                                    aria-label="Default select example"
                                                                    id="height_for_age" name="height_for_age" required>
                                                                    <option value="Normal height">Normal height</option>
                                                                    <option value="Stunted">Stunted</option>
                                                                    <option value="Severely Stunted">Severely Stunted
                                                                    </option>
                                                                    <option value="Tall">Tall</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select the Height for Age.
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 col-4">
                                                                <label for="vision_screening"
                                                                    class="form-label fw-semibold">Vision
                                                                    Screening</label>
                                                                <select class="select2 form-control"
                                                                    id="vision_screening" name="vision_screening"
                                                                    required>
                                                                    <option value="Pass">Pass</option>
                                                                    <option value="Failed">Failed</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select a Vision Screening result.
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 col-4">
                                                                <label for="auditory_screening"
                                                                    class="form-label fw-semibold">Auditory
                                                                    Screening</label>
                                                                <select class="select2 form-control"
                                                                    id="auditory_screening" name="auditory_screening"
                                                                    required>
                                                                    <option value="Pass">Pass</option>
                                                                    <option value="Failed">Failed</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select an Auditory Screening result.
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 col-4">
                                                                <label for="skin_scalp"
                                                                    class="form-label fw-semibold">Skin/Scalp</label>
                                                                <select class="select2 form-control" id="skin_scalp"
                                                                    name="skin_scalp[]" multiple required>
                                                                    <option value="Normal">Normal</option>
                                                                    <option value="Presence of Lice">Presence of Lice
                                                                    </option>
                                                                    <option value="Redness of skin">Redness of skin
                                                                    </option>
                                                                    <option value="White spots">White spots</option>
                                                                    <option value="Flaky skin">Flaky skin</option>
                                                                    <option value="Impetigo/boil">Impetigo/boil</option>
                                                                    <option value="Hematoma">Hematoma</option>
                                                                    <option value="Bruises/Injuries">Bruises/Injuries
                                                                    </option>
                                                                    <option value="Itchiness">Itchiness</option>
                                                                    <option value="Skin lesions">Skin lesions</option>
                                                                    <option value="Acne/pimple">Acne/pimple</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select at least one option for Skin/Scalp.
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 col-4">
                                                                <label for="eyes_ear_nose"
                                                                    class="form-label fw-semibold">Eyes/Ear/Nose</label>
                                                                <select class="select2 form-control" id="eyes_ear_nose"
                                                                    name="eyes_ear_nose[]" multiple required>
                                                                    <option value="Normal">Normal</option>
                                                                    <option value="Stye">Stye</option>
                                                                    <option value="Eye Redness">Eye Redness</option>
                                                                    <option value="Ocular misalignment">Ocular
                                                                        misalignment
                                                                    </option>
                                                                    <option value="Pale conjunctiva">Pale conjunctiva
                                                                    </option>
                                                                    <option value="Ear discharge">Ear discharge</option>
                                                                    <option value="Impacted cerumen">Impacted cerumen
                                                                    </option>
                                                                    <option value="Mucus discharge">Mucus discharge
                                                                    </option>
                                                                    <option value="Nose bleeding">Nose bleeding</option>
                                                                    <option value="Eye discharge">Eye discharge</option>
                                                                    <option value="Matted eyelashes">Matted eyelashes
                                                                    </option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select at least one option for Eyes/Ear/Nose.
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 col-4">
                                                                <label for="mouth_throat_neck"
                                                                    class="form-label fw-semibold">Mouth/Throat/Neck</label>
                                                                <select class="select2 form-control"
                                                                    id="mouth_throat_neck" name="mouth_throat_neck"
                                                                    required>
                                                                    <option value="Normal">Normal</option>
                                                                    <option value="Enlarged tonsils">Enlarged tonsils
                                                                    </option>
                                                                    <option value="Presence of lesions">Presence of
                                                                        lesions
                                                                    </option>
                                                                    <option value="Inflamed pharynx">Inflamed pharynx
                                                                    </option>
                                                                    <option value="Enlarged lymph nodes">Enlarged lymph
                                                                        nodes
                                                                    </option>
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select an option for Mouth/Throat/Neck.
                                                                </div>
                                                            </div>



                                                            <div class="mb-4 col-4"
                                                                id="others_mouth_throat_neck_container"
                                                                style="display: none;">
                                                                <label for="others_mouth_throat_neck"
                                                                    class="form-label fw-semibold">Others
                                                                    (Mouth/Throat/Neck)</label>
                                                                <input type="text" class="form-control"
                                                                    id="others_mouth_throat_neck"
                                                                    name="others_mouth_throat_neck"
                                                                    placeholder="Please specify">
                                                                <div class="invalid-feedback">
                                                                    Please enter a value for Others (Mouth/Throat/Neck).
                                                                </div>
                                                            </div>



                                                            <div class="mb-4 col-4">
                                                                <label for="lungs_heart"
                                                                    class="form-label fw-semibold">Lungs/Heart</label>
                                                                <select class="select2 form-control" id="lungs_heart"
                                                                    name="lungs_heart" required>
                                                                    <option value="Normal">Normal</option>
                                                                    <option value="Rales">Rales</option>
                                                                    <option value="Wheeze">Wheeze</option>
                                                                    <option value="Murmur">Murmur</option>
                                                                    <option value="Irregular heart rate">Irregular heart
                                                                        rate
                                                                    </option>
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select an option for Lungs/Heart.
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 col-4" id="others_lungs_heart_container"
                                                                style="display: none;">
                                                                <label for="others_lungs_heart"
                                                                    class="form-label fw-semibold">Others
                                                                    (Lungs/Heart)</label>
                                                                <input type="text" class="form-control"
                                                                    id="others_lungs_heart" name="others_lungs_heart"
                                                                    placeholder="Please specify">
                                                                <div class="invalid-feedback">
                                                                    Please enter a value for Others (Lungs/Heart).
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 col-4">
                                                                <label for="abdomen"
                                                                    class="form-label fw-semibold">Abdomen</label>
                                                                <select class="select2 form-control" id="abdomen"
                                                                    name="abdomen" required>
                                                                    <option value="Normal">Normal</option>
                                                                    <option value="Distended">Distended</option>
                                                                    <option value="Abdominal pain">Abdominal pain
                                                                    </option>
                                                                    <option value="Tenderness">Tenderness</option>
                                                                    <option value="Dysmenorrhea">Dysmenorrhea</option>
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select an option for Abdomen.
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 col-4" id="others_abdomen_container"
                                                                style="display: none;">
                                                                <label for="others_abdomen"
                                                                    class="form-label fw-semibold">Others
                                                                    (Abdomen)</label>
                                                                <input type="text" class="form-control"
                                                                    id="others_abdomen" name="others_abdomen"
                                                                    placeholder="Please specify">
                                                                <div class="invalid-feedback">
                                                                    Please enter a value for Others (Abdomen).
                                                                </div>
                                                            </div>



                                                            <div class="mb-4 col-4">
                                                                <label for="deformities"
                                                                    class="form-label fw-semibold">Deformities</label>
                                                                <select class="select2 form-control" id="deformities"
                                                                    name="deformities" required>
                                                                    <option value="Acquired">Acquired</option>
                                                                    <option value="Congenital">Congenital</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select an option for Deformities.
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 col-4" id="deformities_input_container"
                                                                style="display: none;">
                                                                <label for="deformities_input"
                                                                    class="form-label fw-semibold">Deformities
                                                                    Input</label>
                                                                <input type="text" class="form-control"
                                                                    id="deformities_input" name="deformities_input"
                                                                    placeholder="Specify">
                                                                <div class="invalid-feedback">
                                                                    Please enter a value for Deformities Specify.
                                                                </div>
                                                            </div>



                                                            <div class="mb-4 col-4">
                                                                <label for="immunization" class="form-label fw-semibold">Immunization</label>
                                                                <select class="select2 form-control" id="immunization" name="immunization" required>
                                                                    <option value="" selected></option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select an option for Immunization.
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 col-4">
                                                                <label for="iron_supplementation" class="form-label fw-semibold">Iron Supplementation</label>
                                                                <select class="select2 form-control" id="iron_supplementation" name="iron_supplementation" required>
                                                                    <option value="" selected> </option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select an option for Iron Supplementation.
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 col-4">
                                                                <label for="deworming" class="form-label fw-semibold">Deworming</label>
                                                                <select class="select2 form-control" id="deworming" name="deworming" required>
                                                                    <option value="" selected></option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select an option for Deworming.
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 col-4">
                                                                <label for="sbfp_beneficiary" class="form-label fw-semibold">SBFP Beneficiary</label>
                                                                <select class="select2 form-control" id="sbfp_beneficiary" name="sbfp_beneficiary" required>
                                                                    <option value="" selected></option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select an option for SBFP Beneficiary.
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 col-4">
                                                                <label for="fourps_beneficiary" class="form-label fw-semibold">Fourps Beneficiary</label>
                                                                <select class="select2 form-control" id="fourps_beneficiary" name="fourps_beneficiary" required>
                                                                    <option value="" selected></option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select an option for Fourps Beneficiary.
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 col-4">
                                                                <label for="menarche" class="form-label fw-semibold">Menarche</label>
                                                                <select class="select2 form-control" id="menarche" name="menarche" required>
                                                                    <option value="" selected></option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select an option for Menarche.
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>




                                                </div>

                                                <div class="col-12">
                                                    <div
                                                        class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                        <button class="btn btn-primary">
                                                            <?php echo ($edit ? "Update" : "Save"); ?>
                                                        </button>
                                                        <button class="btn btn-light-danger text-danger"
                                                            onclick="window.location.href='viewDivision.php'">Cancel</button>
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
    <?php include_once("./include/extra.php"); ?>
    <!--  Customizer -->
    <?php include_once("./include/scripts.php"); ?>
    <script>
        //onload
        $(document).ready(function () {

            $.ajax({
                url: '../controller/studentController.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    function: "getStudentbySchoolId",
                    school_id: <?php echo $_SESSION['userInfo']['assigned']; ?>
                },
                success: function (data) {
                    data = data.data
                    console.log(data)
                    // var data = JSON.parse(response);

                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id + '">' + data[i].firstname + " " + data[i].middlename + " " + data[i].lastname + '</option>';
                    }
                    $('#student').append(html);
                }
            });


            $("#student").on('change', function () {
                var student_id = $(this).val();
                console.log(student_id)
                // $('#checkup_date').prop('disabled', false);
                $.ajax({
                    url: '../controller/checkupController.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        function: "getCheckupDateByStudentId",
                        student_id: student_id
                    },
                    success: function (data) {
                        console.log(data)
                        // data = data.data
                        console.log(data)
                        // var data = JSON.parse(response);

                        var html = '<option value="">Select All</option>';
                        for (var i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].id + '">' + data[i].created_at + '</option>';
                        }
                        $('#checkup_date').html(html);
                        $('#checkup_date').prop('disabled', false);
                    }
                });
            });

        });
    </script>
</body>

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/page-account-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Jul 2023 11:13:35 GMT -->

</html>