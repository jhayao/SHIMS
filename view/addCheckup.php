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
                                <h4 class="fw-semibold mb-8">
                                    <?php echo ($edit ? "Edit Checkup" : "Add Checkup"); ?>
                                </h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a class="text-muted" href="checkup.php">Checkup</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <?php echo ($edit ? "Edit Checkup" : "Add Checkup"); ?>
                                        </li>
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

                            <div class="col-12">
                                <div class="card w-100 position-relative overflow-hidden mb-0">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-semibold">Personal Details</h5>
                                        <p class="card-subtitle mb-4">To change your personal detail , edit and save
                                            from here</p>
                                        <form id="checkupForm" novalidate>
                                            <div class="row g-3">
                                                <div class="col">
                                                    <div class="mb-4 col-6">
                                                        <label for="student_id" class="form-label fw-semibold">Student
                                                            Name</label>
                                                        <select class="select2 form-control"
                                                            aria-label="Default select example" id="student_id" required
                                                            name="student_id">
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Student Name
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="mb-4 col-5">
                                                        <label for="heart_rate" class="form-label fw-semibold">Heart
                                                            Rate</label>
                                                        <input type="text" class="form-control" id="heart_rate"
                                                            name="heart_rate" placeholder="Heart Rate" required>
                                                        <div class="invalid-feedback">
                                                            Please enter a Heart rate.
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 col-5">
                                                        <label for="temperature"
                                                            class="form-label fw-semibold">Temperature</label>
                                                        <input type="text" class="form-control" id="temperature"
                                                            name="temperature" placeholder="Temperature" required>
                                                        <div class="invalid-feedback">
                                                            Please enter an Temperature.
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 col-5">
                                                        <label for="height"
                                                            class="form-label fw-semibold">Height</label>
                                                        <input type="text" class="form-control" id="height"
                                                            name="height" placeholder="Height" required>
                                                        <div class="invalid-feedback">
                                                            Please enter an Height.
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 col-5">
                                                        <label for="weight"
                                                            class="form-label fw-semibold">Weight</label>
                                                        <input type="text" class="form-control" id="weight"
                                                            name="weight" placeholder="Weight" required>
                                                        <div class="invalid-feedback">
                                                            Please enter an Weight.
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 col-5">
                                                        <label for="bmi" class="form-label fw-semibold">BMI</label>
                                                        <select class="select2 form-control"
                                                            aria-label="Default select example" id="bmi" name="bmi"
                                                            required>
                                                            <!-- Add options here -->
                                                            <option value="Normal Weight">Normal Weight</option>
                                                            <option value="Wasted Underweight">Wasted Underweight
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
                                                    <div class="mb-4 col-5">
                                                        <label for="height_for_age"
                                                            class="form-label fw-semibold">Height for Age</label>
                                                        <select class="select2 form-control"
                                                            aria-label="Default select example" id="height_for_age"
                                                            name="height_for_age" required>
                                                            <option value="Normal height">Normal height</option>
                                                            <option value="Stunted">Stunted</option>
                                                            <option value="Severely Stunted">Severely Stunted</option>
                                                            <option value="Tall">Tall</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select the Height for Age.
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 col-5">
                                                        <label for="vision_screening"
                                                            class="form-label fw-semibold">Vision Screening</label>
                                                        <select class="select2 form-control" id="vision_screening"
                                                            name="vision_screening" required>
                                                            <option value="Pass">Pass</option>
                                                            <option value="Failed">Failed</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select a Vision Screening result.
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 col-5">
                                                        <label for="auditory_screening"
                                                            class="form-label fw-semibold">Auditory Screening</label>
                                                        <select class="select2 form-control" id="auditory_screening"
                                                            name="auditory_screening" required>
                                                            <option value="Pass">Pass</option>
                                                            <option value="Failed">Failed</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select an Auditory Screening result.
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 col-5">
                                                        <label for="skin_scalp"
                                                            class="form-label fw-semibold">Skin/Scalp</label>
                                                        <select class="select2 form-control" id="skin_scalp"
                                                            name="skin_scalp[]" multiple required>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Presence of Lice">Presence of Lice</option>
                                                            <option value="Redness of skin">Redness of skin</option>
                                                            <option value="White spots">White spots</option>
                                                            <option value="Flaky skin">Flaky skin</option>
                                                            <option value="Impetigo/boil">Impetigo/boil</option>
                                                            <option value="Hematoma">Hematoma</option>
                                                            <option value="Bruises/Injuries">Bruises/Injuries</option>
                                                            <option value="Itchiness">Itchiness</option>
                                                            <option value="Skin lesions">Skin lesions</option>
                                                            <option value="Acne/pimple">Acne/pimple</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select at least one option for Skin/Scalp.
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 col-5">
                                                        <label for="eyes_ear_nose"
                                                            class="form-label fw-semibold">Eyes/Ear/Nose</label>
                                                        <select class="select2 form-control" id="eyes_ear_nose"
                                                            name="eyes_ear_nose[]" multiple required>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Stye">Stye</option>
                                                            <option value="Eye Redness">Eye Redness</option>
                                                            <option value="Ocular misalignment">Ocular misalignment
                                                            </option>
                                                            <option value="Pale conjunctiva">Pale conjunctiva</option>
                                                            <option value="Ear discharge">Ear discharge</option>
                                                            <option value="Impacted cerumen">Impacted cerumen</option>
                                                            <option value="Mucus discharge">Mucus discharge</option>
                                                            <option value="Nose bleeding">Nose bleeding</option>
                                                            <option value="Eye discharge">Eye discharge</option>
                                                            <option value="Matted eyelashes">Matted eyelashes</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select at least one option for Eyes/Ear/Nose.
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 col-5">
                                                        <label for="mouth_throat_neck"
                                                            class="form-label fw-semibold">Mouth/Throat/Neck</label>
                                                        <select class="select2 form-control" id="mouth_throat_neck"
                                                            name="mouth_throat_neck" required>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Enlarged tonsils">Enlarged tonsils</option>
                                                            <option value="Presence of lesions">Presence of lesions
                                                            </option>
                                                            <option value="Inflamed pharynx">Inflamed pharynx</option>
                                                            <option value="Enlarged lymph nodes">Enlarged lymph nodes
                                                            </option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select an option for Mouth/Throat/Neck.
                                                        </div>
                                                    </div>



                                                    <div class="mb-4 col-5" id="others_mouth_throat_neck_container"
                                                        style="display: none;">
                                                        <label for="others_mouth_throat_neck"
                                                            class="form-label fw-semibold">Others
                                                            (Mouth/Throat/Neck)</label>
                                                        <input type="text" class="form-control"
                                                            id="others_mouth_throat_neck"
                                                            name="others_mouth_throat_neck" placeholder="Please specify"
                                                            >
                                                        <div class="invalid-feedback">
                                                            Please enter a value for Others (Mouth/Throat/Neck).
                                                        </div>
                                                    </div>



                                                    <div class="mb-4 col-5">
                                                        <label for="lungs_heart"
                                                            class="form-label fw-semibold">Lungs/Heart</label>
                                                        <select class="select2 form-control" id="lungs_heart"
                                                            name="lungs_heart" required>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Rales">Rales</option>
                                                            <option value="Wheeze">Wheeze</option>
                                                            <option value="Murmur">Murmur</option>
                                                            <option value="Irregular heart rate">Irregular heart rate
                                                            </option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select an option for Lungs/Heart.
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 col-5" id="others_lungs_heart_container"
                                                        style="display: none;">
                                                        <label for="others_lungs_heart"
                                                            class="form-label fw-semibold">Others (Lungs/Heart)</label>
                                                        <input type="text" class="form-control" id="others_lungs_heart"
                                                            name="others_lungs_heart" placeholder="Please specify">
                                                        <div class="invalid-feedback">
                                                            Please enter a value for Others (Lungs/Heart).
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 col-5">
                                                        <label for="abdomen"
                                                            class="form-label fw-semibold">Abdomen</label>
                                                        <select class="select2 form-control" id="abdomen" name="abdomen"
                                                            required>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Distended">Distended</option>
                                                            <option value="Abdominal pain">Abdominal pain</option>
                                                            <option value="Tenderness">Tenderness</option>
                                                            <option value="Dysmenorrhea">Dysmenorrhea</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select an option for Abdomen.
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 col-5" id="others_abdomen_container"
                                                        style="display: none;">
                                                        <label for="others_abdomen"
                                                            class="form-label fw-semibold">Others (Abdomen)</label>
                                                        <input type="text" class="form-control" id="others_abdomen"
                                                            name="others_abdomen" placeholder="Please specify">
                                                        <div class="invalid-feedback">
                                                            Please enter a value for Others (Abdomen).
                                                        </div>
                                                    </div>



                                                    <div class="mb-4 col-5">
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

                                                    <div class="mb-4 col-5" id="deformities_input_container"
                                                        style="display: none;">
                                                        <label for="deformities_input"
                                                            class="form-label fw-semibold">Deformities Input</label>
                                                        <input type="text" class="form-control" id="deformities_input"
                                                            name="deformities_input" placeholder="Specify">
                                                        <div class="invalid-feedback">
                                                            Please enter a value for Deformities Specify.
                                                        </div>
                                                    </div>



                                                    <div class="mb-4 col-5">
                                                        <label for="immunization"
                                                            class="form-label fw-semibold">Immunization</label>
                                                        <input type="text" class="form-control" id="immunization"
                                                            name="immunization" placeholder="Immunization" required>
                                                        <div class="invalid-feedback">
                                                            Please enter Immunization.
                                                        </div>
                                                    </div>

                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Others</th>
                                                                <th><i class="fas fa-check"></i></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Iron Supplementation</td>
                                                                <td><input type="checkbox" id="iron_supplementation"
                                                                        name="iron_supplementation" value="check"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Deworming</td>
                                                                <td><input type="checkbox" id="deworming"
                                                                        name="deworming" value="check"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>SBFP Beneficiary</td>
                                                                <td><input type="checkbox" id="sbfp_beneficiary"
                                                                        name="sbfp_beneficiary" value="check"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>4P's Beneficiary</td>
                                                                <td><input type="checkbox" id="fourps_beneficiary"
                                                                        name="fourps_beneficiary" value="check"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Menarche</td>
                                                                <td><input type="checkbox" id="menarche" name="menarche"
                                                                        value="check"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Others</td>
                                                                <td><input type="text" id="others" class="form-control"
                                                                        name="others"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>

                                                <div class="col-12">
                                                    <div
                                                        class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                        <button class="btn btn-primary">
                                                            <?php echo ($edit ? "Update" : "Save"); ?>
                                                        </button>
                                                        <button class="btn btn-light-danger text-danger"
                                                            onclick="window.location.href='viewCheckup.php'">Cancel</button>
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


            $('#deformities').on('change', function () {
                var selectedOption = $(this).val();
                var deformitiesInputContainer = $('#deformities_input_container');
                if (selectedOption === 'Congenital') {
                    deformitiesInputContainer.show();
                } else {
                    deformitiesInputContainer.hide();
                }
            });
            $('#abdomen').on('change', function () {
                if ($(this).val() === 'Others') {
                    $('#others_abdomen_container').show();
                } else {
                    $('#others_abdomen_container').hide();
                }
            });

            $('#mouth_throat_neck').on('change', function () {
                var selectedOption = $(this).val();
                var othersContainer = $('#others_mouth_throat_neck_container');
                if (selectedOption === 'Others') {
                    othersContainer.show();
                } else {
                    othersContainer.hide();
                }
            });

            $('#lungs_heart').on('change', function () {
                var selectedOption = $(this).val();
                var othersContainer = $('#others_lungs_heart_container');
                if (selectedOption === 'Others') {
                    othersContainer.show();
                } else {
                    othersContainer.hide();
                }
            });
            $.ajax({
                url: "../controller/studentController.php",
                type: "POST",
                dataType: "json",
                data: {
                    function: "getStudentbySchoolId",
                    school_id: <?php echo $_SESSION['userInfo']['assigned']; ?>
                },
                success: function (data) {
                    console.log(data)
                    data = data.data
                    //console.log(data)
                    //set all inputs from return data
                    var student_id = $('#student_id');
                    student_id.empty();
                    student_id.append('<option value="" selected disabled>Select Student</option>');
                    $.each(data, function (index, value) {
                        student_name = value.firstname + ' ' + value.lastname;
                        student_id.append('<option value="' + value.id + '">' + student_name +
                            '</option>');
                    });
                    // if (<?php echo ($edit); ?>) {
                    //     student_id.val(studentID).trigger("change");
                    // }
                }
            })









            $('#checkupForm').submit(function (event) {

                event.preventDefault();
                var form = $(this);
                console.log(form[0]);
                if (form[0].checkValidity() === false) {
                    for (var i = 0; i < form[0].elements.length; i++) {
                        var element = form[0].elements[i];
                        if (!element.checkValidity()) {
                            console.log(element.name + ' is not valid');
                            console.log(element.validity);
                        }
                    }
                    console.log("test ValidityState");
                    event.stopPropagation();
                } else {

                    // Submit the form
                    var formdata = new FormData(this);
                    console.log(formdata);
                    formdata.append("school_id", <?php echo $_SESSION['userInfo']['assigned']; ?>);
                    if (<?php echo ($edit); ?>) {
                        formdata.append("function", "updateCheckup");
                        formdata.append("id", <?php echo (isset($_GET['id']) ? $_GET['id'] : 0); ?>);
                    }
                    else {
                        formdata.append("function", "addCheckup");
                    }
                    console.log("formdata", formdata)
                    $.ajax({
                        url: "../controller/checkupController.php",
                        type: "POST",
                        dataType: "json",
                        data: formdata,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            //console.log(data);
                            //trim data
                            // data = data.trim();
                            // //console.log(data)
                            console.log(data)
                            if (data.success === "true") {
                                window.location.href = "viewCheckup.php?success=1";
                            } else {
                                console.log(noty)
                                noty.setText(data.errorMessage, true);
                                noty.setType("error", true);
                                noty.show();
                            }

                        },
                        error: function (data) {
                            console.log(data)
                            data = data.trim();
                            //console.log(data);
                            noty.setText("Error", true);
                            noty.setType("error", true);
                            noty.show();
                        }
                    });
                }
                form.addClass('was-validated');
            });



            if (<?php echo (isset($_GET['edit']) ? true : 0); ?>) {
                //request ajax to get data of Checkupby id

                $.ajax({
                    url: "../controller/checkupController.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        function: "editCheckup",
                        id: <?php echo (isset($_GET['id']) ? $_GET['id'] : 0); ?>
                    },
                    success: function (data) {
                        console.log(data)
                        //set all inputs from return data
                        //console.log(data.district_id,data.school_id,data.student_id)
                        $('#student_id').val(data.student_id).prop("readonly", true).trigger("change");
                        $('#heart_rate').val(data.heart_rate);
                        $('#bmi').val(data.BMI).trigger("change");
                        $('#height_for_age').val(data.height_for_age).trigger("change");
                        $('#vision_screening').val(data.vision_screening).trigger("change");
                        $('#auditory_screening').val(data.auditory_screening).trigger("change");
                        $('#skin_scalp').val(data.skin_scalp.split(',')).trigger("change");
                        $('#eyes_ear_nose').val(data.eyes_ear_nose.split(',')).trigger("change");
                        console.log(data.mouth_throat_neck)
                        if (!$("#mouth_throat_neck option[value='" + data.mouth_throat_neck + "']").length) {
                            $('#others_mouth_throat_neck').val(data.mouth_throat_neck);
                            data.mouth_throat_neck = "Others";
                        }

                        if (!$("#lungs_heart option[value='" + data.lungs_heart + "']").length) {
                            $('#others_lungs_heart').val(data.lungs_heart);
                            data.lungs_heart = "Others";
                        }

                        if (!$("#abdomen option[value='" + data.abdomen + "']").length) {
                            $('#others_abdomen').val(data.abdomen);
                            data.abdomen = "Others";
                        }

                        if (!$("#deformities option[value='" + data.deformities + "']").length) {
                            $('#deformities_input').val(data.deformities);
                            data.deformities = "Congenital";
                        }
                        
                        $('#mouth_throat_neck').val(data.mouth_throat_neck).trigger("change");
                        $('#lungs_heart').val(data.lungs_heart).trigger("change");
                        $('#abdomen').val(data.abdomen).trigger("change");
                        $('#deformities').val(data.deformities).trigger("change");
                        $('#immunization').val(data.immunization);
                        $('#iron_supplementation').prop('checked', data.iron_supplementation == 1);
                        $('#deworming').prop('checked', data.deworming == 1);
                        $('#sbfp_beneficiary').prop('checked', data.sbfp_beneficiary == 1);
                        $('#fourps_beneficiary').prop('checked', data.fourps_beneficiary == 1);
                        $('#menarche').prop('checked', data.menarche == 1);
                        $('#others').val(data.others);
                        $('#height').val(data.height);
                        $('#weight').val(data.weight);
                        $('#temperature').val(data.temperature);
                        // $('.findings').text(data.findings);
                        // $('input[name="findings"]').text(data.findings)
                        // console.log(data.prescription)

                        // Use the editor instance API.
                        // findingsEditor.setData(data.findings);
                        // prescriptionEditor.setData(data.prescription)

                    }
                })
            }

        });
    </script>
</body>

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/page-account-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Jul 2023 11:13:35 GMT -->

</html>