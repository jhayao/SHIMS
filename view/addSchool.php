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
                                <h4 class="fw-semibold mb-8"><?php echo ($edit ? "Edit School" : "Add School"); ?></h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a class="text-muted"
                                                href="viewSchool.php">School</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <?php echo ($edit ? "Edit School" : "Add School"); ?>
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
                                        <form id="schoolForm" novalidate>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="school_name" class="form-label fw-semibold">School
                                                            Name</label>
                                                        <input type="text" class="form-control " id="school_name"
                                                            name="school_name" placeholder="Mathew Anderson" required>
                                                        <div class="invalid-feedback">
                                                            Please enter a School Name.
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="address"
                                                            class="form-label fw-semibold">Address</label>
                                                        <input type="text" class="form-control" id="address"
                                                            name="address" placeholder="Mathew Anderson" required>
                                                        <div class="invalid-feedback">
                                                            Please enter an Address.
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="division_id" class="form-label fw-semibold">Division
                                                            Name</label>
                                                        <select class="select2 form-control"
                                                            aria-label="Default select example" id="division_id"
                                                            required name="division_id">

                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Division Name
                                                        </div>
                                                    </div>

                                                    <div class="mb-4">
                                                        <label for="district_id" class="form-label fw-semibold">District
                                                            Name</label>
                                                        <select class="select2 form-control"
                                                            aria-label="Default select example" disabled
                                                            id="district_id" required name="district_id">

                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Division Name
                                                        </div>
                                                    </div>



                                                </div>

                                                <div class="col-12">
                                                    <div
                                                        class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                        <button
                                                            class="btn btn-primary"><?php echo ($edit ? "Update" : "Save"); ?></button>
                                                        <button class="btn btn-light-danger text-danger"
                                                            onclick="window.location.href='viewSchool.php'">Cancel</button>
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
    <script>
        //onload
        $(document).ready(function () {

            $.ajax({
                url: "../controller/divisionController.php",
                type: "POST",
                dataType: "json",
                data: {
                    function: "getAllDivision"
                },
                success: function (data) {
                    //populate select2 with division data
                    var divisionSelect = $('#division_id');
                    data = data.data
                    // console.log(data)
                    divisionSelect.empty();
                    $.each(data, function (index, value) {
                        divisionSelect.append('<option value="' + value.id + '">' + value.division_name + '</option>');
                    });
                    divisionSelect.trigger('change');
                }
            });

            //disable distrcit_id


            //on change division_id
            $('#division_id').on('change', function () {
                var divisionId = $(this).val();
                // console.log(divisionId)
                $.ajax({
                    url: "../controller/districtController.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        function: "getDistrictsByDivisionName",
                        division_id: divisionId
                    },
                    success: function (data) {
                        //populate select2 with division data
                        var districtSelect = $('#district_id');
                        data = data.data
                        // console.log(data)
                        districtSelect.empty();
                        $.each(data, function (index, value) {
                            districtSelect.append('<option value="' + value.id + '">' + value.district_name + '</option>');
                        });
                        districtSelect.prop('disabled', false);
                        districtSelect.trigger('change');
                    }
                });
            });
            // $('#district_id').prop('disabled', true);

            if (<?php echo (isset($_GET['edit']) ? true : 0); ?>) {
                //request ajax to get data of school by id



                $.ajax({
                    url: "../controller/schoolController.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        function: "editSchool",
                        id: <?php echo (isset($_GET['id']) ? $_GET['id'] : 0); ?>
                    },
                    success: function (data) {
                        //set all inputs from return data

                        console.log(data)
                        //set all inputs from return data
                        $('#school_name').val(data.school_name);
                        $('#address').val(data.address);
                        $('#division_id').val(data.division_id);
                        $('#division_id').trigger('change');
                        $('#district_id').val(data.district_id);
                        $('#district_id').trigger('change');
                    }
                })
            }



            var schoolForm = document.getElementById('schoolForm');
            var schoolFormValidation = Array.prototype.filter.call(schoolForm, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });

            $('#schoolForm').submit(function (event) {
                event.preventDefault();
                var form = $(this);
                if (form[0].checkValidity() === false) {
                    event.stopPropagation();
                } else {
                    // Submit the form
                    var formdata = new FormData(this);
                    if (<?php echo ($edit); ?>) {
                        formdata.append("function", "updateSchool");
                        formdata.append("id", <?php echo (isset($_GET['id']) ? $_GET['id'] : 0); ?>);
                    }
                    else {
                        formdata.append("function", "addSchool");
                    }

                    $.ajax({
                        url: "../controller/schoolController.php",
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
                                window.location.href = "viewSchool.php?success=1";
                            } else {
                                noty.setText("Error", true);
                                noty.setType("error", true);
                                noty.show();
                            }

                        },
                        error: function (data) {
                            data = data.trim();
                            console.log(data);
                            noty.setText("Error", true);
                            noty.setType("error", true);
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