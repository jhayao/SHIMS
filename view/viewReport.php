<?php isset($_GET['edit']) ? $edit = $_GET['edit'] : $edit = 0; ?>
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
                                        <form id="divisionForm" action="../controller/reportController.php"
                                            method="post" novalidate>
                                            <input type="hidden" name="function" value="generateReport">
                                            <div class="row">
                                                <div class="col">

                                                    <div class="mb-4 col-4 ">
                                                        <label for="report" class="form-label fw-semibold">Report
                                                            Type</label>
                                                        <select class="form-control select2" id="report" name="report">
                                                            <option value="">Select a Report Type</option>
                                                            <option value="1">Individual Report</option>
                                                            <option value="2">Monthly Report</option>
                                                            <option value="3">Quarterly Report</option>
                                                            <option value="4">Annual Report</option>
                                                            <!-- Add options dynamically here -->
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select a Report Type.
                                                        </div>
                                                    </div>
                                                    <div class="individual" id="individual">
                                                        <div class="mb-4">
                                                            <label for="student" class="form-label fw-semibold">Student
                                                                Name</label>
                                                            <select class="form-control select2 " id="student"
                                                                name="student">
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
                                                            <select class="form-control select2 " id="checkup_date"
                                                                name="checkup_date" disabled>
                                                                <option value="0" selected>Select All</option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a Checkup Date.
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <h3 class="h1group" id="h1group">School Details</h3>
                                                    <hr>
                                                    <div class="group" id="group">
                                                        <div class="row">
                                                            <div class="mb-4 col-4 divCol" id="divCol">
                                                                <label for="division"
                                                                    class="form-label fw-semibold">Division</label>
                                                                <select class="form-control select2" id="division"
                                                                    name="division">
                                                                    <option value="">Select a Division</option>

                                                                    <!-- Add options dynamically here -->
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select a Division.
                                                                </div>
                                                            </div>
                                                            <div class="mb-4 col-4 distCol" id="distCol">
                                                                <label for="district"
                                                                    class="form-label fw-semibold">District</label>
                                                                <select class="form-control select2" id="district"
                                                                    name="district">
                                                                    <option value="">Select a District</option>

                                                                    <!-- Add options dynamically here -->
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select a District.
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 col-4 schoolCol" id="schoolCol">
                                                                <label for="school"
                                                                    class="form-label fw-semibold">School</label>
                                                                <select class="form-control select2 " id="school"
                                                                    name="school">
                                                                    <option value="">Select a School</option>

                                                                    <!-- Add options dynamically here -->
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select a School.
                                                                </div>
                                                            </div>
                                                            <div class="mb-4 col-4">
                                                                <label for="checkup_date"
                                                                    class="form-label fw-semibold">Checkup Date</label>
                                                                <input class="form-control" type="text" name="daterange"
                                                                    value="" />
                                                                <div class="invalid-feedback">
                                                                    Please select a Checkup Date.
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="mb-4 col-4">
                                                                    <label for="bmi"
                                                                        class="form-label fw-semibold">BMI</label>
                                                                    <select class="select2 form-control"
                                                                        aria-label="Default select example" id="bmi"
                                                                        name="bmi">
                                                                        <!-- Add options here -->
                                                                        <option> </option>
                                                                        <option value="Normal Weight">Normal Weight
                                                                        </option>
                                                                        <option value="Wasted Underweight">Wasted
                                                                            Underweight
                                                                        </option>
                                                                        <option value="Severely Wasted/Underweight">
                                                                            Severely
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
                                                                        id="height_for_age" name="height_for_age">
                                                                        <option> </option>
                                                                        <option value="Normal height">Normal height
                                                                        </option>
                                                                        <option value="Stunted">Stunted</option>
                                                                        <option value="Severely Stunted">Severely
                                                                            Stunted
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
                                                                        id="vision_screening" name="vision_screening">
                                                                        <option> </option>
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
                                                                        id="auditory_screening"
                                                                        name="auditory_screening">
                                                                        <option> </option>
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
                                                                        name="skin_scalp[]" multiple>
                                                                        <option> </option>
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Presence of Lice">Presence of
                                                                            Lice
                                                                        </option>
                                                                        <option value="Redness of skin">Redness of skin
                                                                        </option>
                                                                        <option value="White spots">White spots</option>
                                                                        <option value="Flaky skin">Flaky skin</option>
                                                                        <option value="Impetigo/boil">Impetigo/boil
                                                                        </option>
                                                                        <option value="Hematoma">Hematoma</option>
                                                                        <option value="Bruises/Injuries">
                                                                            Bruises/Injuries
                                                                        </option>
                                                                        <option value="Itchiness">Itchiness</option>
                                                                        <option value="Skin lesions">Skin lesions
                                                                        </option>
                                                                        <option value="Acne/pimple">Acne/pimple</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select at least one option for
                                                                        Skin/Scalp.
                                                                    </div>
                                                                </div>

                                                                <div class="mb-4 col-4">
                                                                    <label for="eyes_ear_nose"
                                                                        class="form-label fw-semibold">Eyes/Ear/Nose</label>
                                                                    <select class="select2 form-control"
                                                                        id="eyes_ear_nose" name="eyes_ear_nose[]"
                                                                        multiple>
                                                                        <option> </option>
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Stye">Stye</option>
                                                                        <option value="Eye Redness">Eye Redness</option>
                                                                        <option value="Ocular misalignment">Ocular
                                                                            misalignment
                                                                        </option>
                                                                        <option value="Pale conjunctiva">Pale
                                                                            conjunctiva
                                                                        </option>
                                                                        <option value="Ear discharge">Ear discharge
                                                                        </option>
                                                                        <option value="Impacted cerumen">Impacted
                                                                            cerumen
                                                                        </option>
                                                                        <option value="Mucus discharge">Mucus discharge
                                                                        </option>
                                                                        <option value="Nose bleeding">Nose bleeding
                                                                        </option>
                                                                        <option value="Eye discharge">Eye discharge
                                                                        </option>
                                                                        <option value="Matted eyelashes">Matted
                                                                            eyelashes
                                                                        </option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select at least one option for
                                                                        Eyes/Ear/Nose.
                                                                    </div>
                                                                </div>

                                                                <div class="mb-4 col-4">
                                                                    <label for="mouth_throat_neck"
                                                                        class="form-label fw-semibold">Mouth/Throat/Neck</label>
                                                                    <select class="select2 form-control"
                                                                        id="mouth_throat_neck" name="mouth_throat_neck">
                                                                        <option> </option>
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Enlarged tonsils">Enlarged
                                                                            tonsils
                                                                        </option>
                                                                        <option value="Presence of lesions">Presence of
                                                                            lesions
                                                                        </option>
                                                                        <option value="Inflamed pharynx">Inflamed
                                                                            pharynx
                                                                        </option>
                                                                        <option value="Enlarged lymph nodes">Enlarged
                                                                            lymph
                                                                            nodes
                                                                        </option>
                                                                        <option value="Others">Others</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select an option for Mouth/Throat/Neck.
                                                                    </div>
                                                                </div>
                                                                <div class="mb-4 col-4">
                                                                    <label for="lungs_heart"
                                                                        class="form-label fw-semibold">Lungs/Heart</label>
                                                                    <select class="select2 form-control"
                                                                        id="lungs_heart" name="lungs_heart">
                                                                        <option> </option>
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Rales">Rales</option>
                                                                        <option value="Wheeze">Wheeze</option>
                                                                        <option value="Murmur">Murmur</option>
                                                                        <option value="Irregular heart rate">Irregular
                                                                            heart
                                                                            rate
                                                                        </option>
                                                                        <option value="Others">Others</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select an option for Lungs/Heart.
                                                                    </div>
                                                                </div>

                                                                <div class="mb-4 col-4"
                                                                    id="others_lungs_heart_container"
                                                                    style="display: none;">
                                                                    <label for="others_lungs_heart"
                                                                        class="form-label fw-semibold">Others
                                                                        (Lungs/Heart)</label>
                                                                    <input type="text" class="form-control"
                                                                        id="others_lungs_heart"
                                                                        name="others_lungs_heart"
                                                                        placeholder="Please specify">
                                                                    <div class="invalid-feedback">
                                                                        Please enter a value for Others (Lungs/Heart).
                                                                    </div>
                                                                </div>

                                                                <div class="mb-4 col-4">
                                                                    <label for="abdomen"
                                                                        class="form-label fw-semibold">Abdomen</label>
                                                                    <select class="select2 form-control" id="abdomen"
                                                                        name="abdomen">
                                                                        <option> </option>
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="Distended">Distended</option>
                                                                        <option value="Abdominal pain">Abdominal pain
                                                                        </option>
                                                                        <option value="Tenderness">Tenderness</option>
                                                                        <option value="Dysmenorrhea">Dysmenorrhea
                                                                        </option>
                                                                        <option value="Others">Others</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select an option for Abdomen.
                                                                    </div>
                                                                </div>
                                                                <div class="mb-4 col-4">
                                                                    <label for="deformities"
                                                                        class="form-label fw-semibold">Deformities</label>
                                                                    <select class="select2 form-control"
                                                                        id="deformities" name="deformities">
                                                                        <option> </option>
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
                                                                    <label for="immunization"
                                                                        class="form-label fw-semibold">Immunization</label>
                                                                    <select class="select2 form-control"
                                                                        id="immunization" name="immunization">
                                                                        <option value="" selected></option>
                                                                        <option value="Yes">Yes</option>
                                                                        <option value="No">No</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select an option for Immunization.
                                                                    </div>
                                                                </div>

                                                                <div class="mb-4 col-4">
                                                                    <label for="iron_supplementation"
                                                                        class="form-label fw-semibold">Iron
                                                                        Supplementation</label>
                                                                    <select class="select2 form-control"
                                                                        id="iron_supplementation"
                                                                        name="iron_supplementation">
                                                                        <option value="" selected> </option>
                                                                        <option value="Yes">Yes</option>
                                                                        <option value="No">No</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select an option for Iron
                                                                        Supplementation.
                                                                    </div>
                                                                </div>

                                                                <div class="mb-4 col-4">
                                                                    <label for="deworming"
                                                                        class="form-label fw-semibold">Deworming</label>
                                                                    <select class="select2 form-control" id="deworming"
                                                                        name="deworming">
                                                                        <option value="" selected></option>
                                                                        <option value="Yes">Yes</option>
                                                                        <option value="No">No</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select an option for Deworming.
                                                                    </div>
                                                                </div>

                                                                <div class="mb-4 col-4">
                                                                    <label for="sbfp_beneficiary"
                                                                        class="form-label fw-semibold">SBFP
                                                                        Beneficiary</label>
                                                                    <select class="select2 form-control"
                                                                        id="sbfp_beneficiary" name="sbfp_beneficiary">
                                                                        <option value="" selected></option>
                                                                        <option value="Yes">Yes</option>
                                                                        <option value="No">No</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select an option for SBFP Beneficiary.
                                                                    </div>
                                                                </div>

                                                                <div class="mb-4 col-4">
                                                                    <label for="fourps_beneficiary"
                                                                        class="form-label fw-semibold">Fourps
                                                                        Beneficiary</label>
                                                                    <select class="select2 form-control"
                                                                        id="fourps_beneficiary"
                                                                        name="fourps_beneficiary">
                                                                        <option value="" selected></option>
                                                                        <option value="Yes">Yes</option>
                                                                        <option value="No">No</option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select an option for Fourps Beneficiary.
                                                                    </div>
                                                                </div>

                                                                <div class="mb-4 col-4">
                                                                    <label for="menarche"
                                                                        class="form-label fw-semibold">Menarche</label>
                                                                    <select class="select2 form-control" id="menarche"
                                                                        name="menarche">
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
                                                                Generate Report
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
    <?php include_once ("./include/extra.php"); ?>
    <!--  Customizer -->
    <?php include_once ("./include/scripts.php"); ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script>
        //onload
        $(document).ready(function () {
            <?php $_SESSION['userInfo']['nurse_type'] = "school nurse";
            $_SESSION['userInfo']['assigned'] = 3 ?>

            function initDivision() {
                $.ajax({
                    url: '../controller/divisionController.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        function: "getAllDivision"
                    },
                    success: function (data) {
                        data = data.data
                        // console.log(data)
                        // var data = JSON.parse(response);

                        var html = '';
                        for (var i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].id + '">' + data[i].division_name + '</option>';
                        }
                        $('#division').empty(); // Clear the division before appending
                        $('#division').append(html);
                        $('#division').trigger('change');
                    }
                });
            }

            function initDistrict(division_id) {
                // if(division_id == null){
                //     division_id = $('#division').val();
                // }
                console.log(division_id)
                $.ajax({
                    url: '../controller/districtController.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        function: "getDistrictsByDivisionName",
                        division_id: division_id
                    },
                    success: function (data) {
                        data = data.data
                        // console.log(data)
                        // var data = JSON.parse(response);

                        var html = '';
                        for (var i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].id + '">' + data[i].district_name + '</option>';
                        }
                        $('#district').empty(); // Clear the district before appending
                        $('#district').append(html);
                        // console.log(html);
                        $('#district').trigger('change');
                    }
                });
            }

            $('#division').on('change', function () {
                var division_id = $(this).val();
                console.log(division_id)
                initDistrict(division_id);
            });

            function initSchool(district_id = null) {
                if (district_id == null) {
                    district_id = $('#district').val();
                }
                $.ajax({
                    url: '../controller/schoolController.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        function: "getSchoolbyDistrictId",
                        district_id: district_id
                    },
                    success: function (data) {
                        data = data.data
                        // console.log(data)
                        // var data = JSON.parse(response);

                        var html = '';
                        for (var i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].id + '">' + data[i].school_name + '</option>';
                        }
                        $('#school').empty(); // Clear the school before appending
                        $('#school').append(html);
                        $('#school').trigger('change');
                    }
                });
            }


            $('#district').on('change', function () {
                var district_id = $(this).val();
                console.log(district_id)
                initSchool();
            });



            function getStudentbySchoolId() {
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
                        // console.log(data)
                        // var data = JSON.parse(response);

                        var html = '<option value="0" selected>Select All</option>';
                        for (var i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].id + '">' + data[i].firstname + " " + data[i].middlename + " " + data[i].lastname + '</option>';

                        }
                        $('#student').empty(); // Clear the student before appending
                        $('#student').append(html);

                    }
                });
            }



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
                        var html = '<option value="0">Select All</option>';
                        for (var i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].id + '">' + data[i].created_at + '</option>';
                        }
                        $('#checkup_date').html(html);
                        $('#checkup_date').prop('disabled', false);
                    }
                });
            });

            <?php if (strtolower($_SESSION['userInfo']['nurse_type']) === 'school nurse') { ?>
                $('#divCol').hide();
                $('#distCol').hide();
                $('#schoolCol').hide();

            <?php } else if (strtolower($_SESSION['userInfo']['nurse_type']) === 'division nurse') { ?>

                    $('#divCol').hide();


                    initDistrict(<?php echo $_SESSION['userInfo']['assigned']; ?>);
                    // $('#distCol').hide();    
            <?php } else if (strtolower($_SESSION['userInfo']['nurse_type']) === 'district nurse') { ?>
                        $('#divCol').hide();
                        $('#distCol').hide();

                        initSchool(<?php echo $_SESSION['userInfo']['assigned']; ?>);
                        // $('#schoolCol').hide();
            <?php } else { ?>
                        initDivision();
            <?php } ?>

            $('#divisionForm').on('submit', function (e) {
                if (!this.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                this.classList.add('was-validated');



            });


            $.fn.datepicker.dates['qtrs'] = {
                days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                daysShort: ["Sun", "Moon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                months: ["Q1", "Q2", "Q3", "Q4", "", "", "", "", "", "", "", ""],
                monthsShort: ["Q1", "Q2", "Q3", "Q4", "", "", "", "", "", "", "", ""],
                today: "Today",
                clear: "Clear",
                format: "mm/dd/yyyy",
                titleFormat: "MM yyyy",
                /* Leverages same syntax as 'format' */
                weekStart: 0
            };

            $("#individual").hide()
            $("#group").hide()
            $("#h1group").hide()
            // $("#individual").find('select').prop('', false);
            // $("#group").find('select').prop('', false);

            $("#report").on('change', function () {
                var report = $(this).val();
                if (report == 2 || report == 3 || report == 4) {
                    $("#individual").hide()
                    // $("#individual").find('.').prop('', false);
                    $("#group").show()
                    if (report == 2) {
                        $('input[name="daterange"]').datepicker('destroy').datepicker({
                            format: "mm/yyyy",
                            startView: "year",
                            minView: "year",
                            defaultDate: new Date()
                        });
                    }
                    else if (report == 3) {
                        $('input[name="daterange"]').datepicker('destroy').datepicker({
                            format: "MM yyyy",
                            minViewMode: 1,
                            autoclose: true,
                            language: "qtrs",
                            forceParse: false
                        }).on("show", function (event) {

                            $(".month").each(function (index, element) {
                                if (index > 3) $(element).hide();
                            });
                        });

                    }
                    else if (report == 4) {
                        $('input[name="daterange"]').datepicker('destroy').datepicker({
                            format: "yyyy",
                            viewMode: "years",
                            minViewMode: "years",
                            defaultDate: new Date()
                        });

                    }
                    // $("#group").find('.').prop('', true);
                } else if (report == 1) {
                    $("#individual").show()
                    // $("#individual").find('.').prop('', true);
                    $("#group").hide()
                    // $("#group").find('.').prop('', false);
                    getStudentbySchoolId();
                } else {
                    $("#individual").hide()
                    // $("#individual").prop('.', false);
                    $("#group").hide()
                    // $("#group").find('.').prop('', false);
                    $("h1group").hide()
                }
            });


        });


    </script>
</body>

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/page-account-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Jul 2023 11:13:35 GMT -->

</html>