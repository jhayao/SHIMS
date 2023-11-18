<?php include_once('include/head.php'); ?>

<?php
if ($_SESSION['user_type'] == "nurse") {
  include_once('../controller/nurseController.php');
  $nurse = new Nurse();
  $nurse_details = $nurse->editNurse($_SESSION['userInfo']['id'])->fetch_assoc();
} else if ($_SESSION['user_type'] == 'student') {
  include_once('../controller/studentController.php');
  $student = new Student();
  $student_details = $student->getStudentById($_SESSION['userInfo']['id'])->fetch_assoc();
  $query = "select information.id, CONCAT(student.firstname,' ', student.middlename, ' ', student.lastname) as studentName, CONCAT(nurse.firstname,' ',nurse.middlename,' ',nurse.lastname) as nurseName,information.height,information.temperature, information.weight, information.created_at, information.findings,information.prescription from student inner join information on student.id = information.student_id inner join nurse on nurse.id = information.nurse_id where student.id = ? order by information.created_at desc";
  $connection = new Connection();
  $conn = $connection->connect();
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $_SESSION['userInfo']['id']);
  $stmt->execute();
  $result = $stmt->get_result();
  // echo json_encode($result);
  // echo json_encode($student_details);
}

?>


<body>
  <!-- Preloader -->
  <div class="preloader">
    <img src="../dist/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <!-- Preloader -->
  <div class="preloader">
    <img src="../dist/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
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
                <h4 class="fw-semibold mb-8">Account Setting</h4>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-muted" href="./../index.php">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Account Setting</li>
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
          <ul class="nav nav-pills user-profile-tab" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-4" id="pills-account-tab" data-bs-toggle="pill" data-bs-target="#pills-account" type="button" role="tab" aria-controls="pills-account" aria-selected="true">
                <i class="ti ti-user-circle me-2 fs-6"></i>
                <span class="d-none d-md-block">Account</span>
              </button>
            </li>

            <li class="nav-item" role="presentation">
              <button class="nav-link position-relative rounded-0  d-flex align-items-center justify-content-center bg-transparent fs-3 py-4" id="pills-notifications-tab" data-bs-toggle="pill" data-bs-target="#pills-notifications" type="button" role="tab" aria-controls="pills-notifications" aria-selected="true">
                <i class="ti ti-heart me-2 fs-6"></i>
                <span class="d-none d-md-block">Records</span>
              </button>
            </li>

          </ul>
          <div class="card-body">
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
                <div class="row">
                  <div class="col-lg-6 d-flex align-items-stretch">
                    <div class="card w-100 position-relative overflow-hidden">
                      <div class="card-body p-4">
                        <h5 class="card-title fw-semibold">Change Profile</h5>
                        <p class="card-subtitle mb-4">Change your profile picture from here</p>
                        <div class="text-center">
                          <input type="file" id="profileImage" name="profileImage" style="display: none;">
                          <label for="profileImage">
                            <img src="../dist/images/profile/user-1.jpg" alt="" class="img-fluid rounded-circle" width="120" height="120">
                          </label>
                          <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                            <button class="btn btn-primary">Upload</button>
                            <button class="btn btn-outline-danger">Reset</button>
                          </div>
                          <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-stretch">
                    <div class="card w-100 position-relative overflow-hidden">
                      <div class="card-body p-4">
                        <h5 class="card-title fw-semibold">Change Password</h5>
                        <p class="card-subtitle mb-4">To change your password please confirm here</p>
                        <form id="changePassword">
                          <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label fw-semibold">Current Password</label>
                            <input type="password" required name="oldPassword" class="form-control" id="exampleInputPassword1" placeholder="Current Password">
                          </div>
                          <div class="mb-4">
                            <label for="exampleInputPassword2" class="form-label fw-semibold">New Password</label>
                            <input type="password" required name="password" class="form-control" id="exampleInputPassword2" placeholder="New Password">
                          </div>
                          <div class="">
                            <label for="exampleInputPassword3" class="form-label fw-semibold">Confirm Password</label>
                            <input type="password" required name="confirmPassword" class="form-control" id="exampleInputPassword3" placeholder="Confirm Password">
                          </div>
                          <div class="col-12">
                            <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                              <button class="btn btn-primary">
                                Update
                              </button>
                              <!-- <button class="btn btn-light-danger text-danger"
                                      onclick="window.location.href='viewNurse.php'">Cancel</button> -->
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <?php if ($_SESSION['user_type'] == 'student') {
                  ?>
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
                                  <label for="firstname" class="form-label fw-semibold">First Name</label>
                                  <input type="text" name="firstname" class="form-control " id="firstname" name="firstname" placeholder="Mathew Anderson" value="<?php echo $student_details['firstname'] ?>" required>
                                  <div class="invalid-feedback">
                                    Please enter a First Name.
                                  </div>
                                </div>
                                <div class="mb-4">
                                  <label for="middlename" class="form-label fw-semibold">Middle Name</label>
                                  <input type="text" name="middlename" class="form-control" id="middlename" name="middlename" placeholder="Mathew Anderson" value="<?php echo $student_details['middlename'] ?>" required>
                                  <div class="invalid-feedback">
                                    Please enter a Middle Name.
                                  </div>
                                </div>
                                <div class="mb-4">
                                  <label for="lastname" class="form-label fw-semibold">Last
                                    Name</label>
                                  <input type="text" name="lastname" class="form-control" value="<?php echo $student_details['lastname'] ?>" id="lastname" name="lastname" placeholder="Mathew Anderson" required>
                                  <div class="invalid-feedback">
                                    Please enter a Last Name.
                                  </div>
                                </div>
                                <div class="mb-4">
                                  <label for="dob" class="form-label fw-semibold">Birthday</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control mydatepicker" value="<?php echo $student_details['dob'] ?>" id="dob" name="dob" placeholder="mm/dd/yyyy" />
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
                                  <input type="text" class="form-control" id="guardian" name="guardian" placeholder="Mathew Anderson" value="<?php echo $student_details['guardian'] ?>" required>
                                  <div class="invalid-feedback">
                                    Please enter a Guardian Name.
                                  </div>
                                </div>
                                <div class="mb-4">
                                  <label for="email" class="form-label fw-semibold">Email</label>
                                  <input type="email" class="form-control" value="<?php echo $student_details['email'] ?>" id="email" name="email" placeholder="info@modernize.com" required>
                                  <div class="invalid-feedback">
                                    Please enter a valid Email.
                                  </div>
                                </div>
                                <div class="mb-4">
                                  <label for="contact" class="form-label fw-semibold">Phone</label>
                                  <input type="text" class="form-control" value="<?php echo $student_details['contact'] ?>" id="contact" name="contact" placeholder="+91 12345 65478" required>
                                  <div class="invalid-feedback">
                                    Please enter a valid Phone.
                                  </div>
                                </div>

                                <div class="mb-4">
                                  <label for="sex" class="form-label fw-semibold">Sex</label>
                                  <select class="select2 form-control" aria-label="Default select example" id="sex" required name="sex">
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
                                  <label for="street" class="form-label fw-semibold">Street</label>
                                  <input type="text" class="form-control" id="street" value="<?php echo $student_details['street'] ?>" name="street" placeholder="" required>
                                  <div class="invalid-feedback">
                                    Please enter a valid Street
                                  </div>
                                </div>
                                <div class="mb-4">
                                  <label for="barangay" class="form-label fw-semibold">Barangay</label>
                                  <input type="text" class="form-control" id="barangay" value="<?php echo $student_details['barangay'] ?>" name="barangay" placeholder="" required>
                                  <div class="invalid-feedback">
                                    Please enter a valid Barangay
                                  </div>
                                </div>
                                <div class="mb-4">
                                  <label for="city" class="form-label fw-semibold">City</label>
                                  <select class="select2 form-control" aria-label="Default select example" id="city" name="city">
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
                                  <label for="province" class="form-label fw-semibold">Province</label>
                                  <select class="select2 form-control" aria-label="Default select example" id="province" name="province">
                                    <!-- City of Misamis Occidenta-->
                                    <!-- <option >Tangub</option> -->
                                    <option selected value="Misamis Occidental">Misamis
                                      Occidental</option>
                                  </select>
                                </div>
                                <div class="mb-4">
                                  <label for="postal" class="form-label fw-semibold">Postal</label>
                                  <input type="text" class="form-control" value="<?php echo $student_details['postal'] ?>" id="postal" name="postal" placeholder="" required>
                                  <div class="invalid-feedback">
                                    Please enter a valid Postal
                                  </div>
                                </div>
                                <!-- <div class="mb-4">
                                  <label for="type" class="form-label fw-semibold">School Name</label>
                                  <select class="select2 form-control" aria-label="Default select example" id="type"
                                    name="type">

                                  </select>
                                </div> -->
                              </div>
                              <div class="col-12">
                                <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                  <button class="btn btn-primary">
                                    <?php echo ("Update"); ?>
                                  </button>
                                  <button class="btn btn-light-danger text-danger" onclick="window.location.href='viewStudent.php'">Cancel</button>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  <? } else if ($_SESSION['user_type'] == 'nurse') { ?>
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
                                  <label for="nurse_firstname" class="form-label fw-semibold">First Name</label>
                                  <input type="text" class="form-control " id="nurse_firstname" name="nurse_firstname" placeholder="Mathew Anderson" value="<?php echo $nurse_details['firstname'] ?>" required>
                                  <div class="invalid-feedback">
                                    Please enter a First Name.
                                  </div>
                                </div>
                                <div class="mb-4">
                                  <label for="nurse_middlename" class="form-label fw-semibold">Middle Name</label>
                                  <input type="text" class="form-control" id="nurse_middlename" value="<?php echo $nurse_details['middlename'] ?>" name="nurse_middlename" placeholder="Mathew Anderson" required>
                                  <div class="invalid-feedback">
                                    Please enter a Middle Name.
                                  </div>
                                </div>
                                <div class="mb-4">
                                  <label for="nurse_lastname" class="form-label fw-semibold">Last
                                    Name</label>
                                  <input type="text" class="form-control" id="nurse_lastname" value="<?php echo $nurse_details['lastname'] ?>" name="nurse_lastname" placeholder="Mathew Anderson" required>
                                  <div class="invalid-feedback">
                                    Please enter a Last Name.
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-4">
                                  <label for="nurse_email" class="form-label fw-semibold">Email</label>
                                  <input type="email" class="form-control" id="nurse_email" value="<?php echo $nurse_details['email'] ?>" name="nurse_email" placeholder="info@modernize.com" required>
                                  <div class="invalid-feedback">
                                    Please enter a valid Email.
                                  </div>
                                </div>
                                <div class="mb-4">
                                  <label for="nurse_contact" class="form-label fw-semibold">Phone</label>
                                  <input type="text" class="form-control" id="nurse_contact" name="nurse_contact" value="<?php echo $nurse_details['contact'] ?>" placeholder="+91 12345 65478" required>
                                  <div class="invalid-feedback">
                                    Please enter a valid Phone.
                                  </div>
                                </div>

                                <div class="mb-4">
                                  <label for="nurse_sex" class="form-label fw-semibold">Sex</label>
                                  <select class="select2 form-control" aria-label="Default select example" id="nurse_sex" required name="nurse_sex">
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                  </select>
                                  <div class="invalid-feedback">
                                    Please enter a valid gender
                                  </div>
                                </div>

                              </div>
                              <div class="col-lg-6">
                                <div class="mb-4">
                                  <label for="nurse_street" class="form-label fw-semibold">Street</label>
                                  <input type="text" value="<?php echo $nurse_details['street'] ?>" class="form-control" id="nurse_street" name="nurse_street" placeholder="" required>
                                  <div class="invalid-feedback">
                                    Please enter a valid Street
                                  </div>
                                </div>
                                <div class="mb-4">
                                  <label for="nurse_barangay" class="form-label fw-semibold">Barangay</label>
                                  <input type="text" class="form-control" value="<?php echo $nurse_details['barangay'] ?>" id="nurse_barangay" name="nurse_barangay" placeholder="" required>
                                  <div class="invalid-feedback">
                                    Please enter a valid Barangay
                                  </div>
                                </div>
                                <div class="mb-4">
                                  <label for="nurse_city" class="form-label fw-semibold">City</label>
                                  <select class="select2 form-control" aria-label="Default select example" value="<?php echo $nurse_details['city'] ?>" id="nurse_city" name="nurse_city">
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
                                  <label for="nurse_province" class="form-label fw-semibold">Province</label>
                                  <select class="select2 form-control" aria-label="Default select example" id="nurse_province" name="nurse_province">
                                    <!-- City of Misamis Occidenta-->
                                    <!-- <option >Tangub</option> -->
                                    <option selected value="Misamis Occidental">Misamis
                                      Occidental</option>
                                  </select>
                                </div>
                                <div class="mb-4">
                                  <label for="nurse_postal" class="form-label fw-semibold">Postal</label>
                                  <input type="text" class="form-control" value="<?php echo $nurse_details['postal'] ?>" id="nurse_postal" name="nurse_postal" placeholder="" required>
                                  <div class="invalid-feedback">
                                    Please enter a valid Postal
                                  </div>
                                </div>
                              </div>

                              <div class="col-12">
                                <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                  <button class="btn btn-primary">
                                    Update
                                  </button>
                                  <!-- <button class="btn btn-light-danger text-danger"
                                      onclick="window.location.href='viewNurse.php'">Cancel</button> -->
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  <? } ?>

                </div>
              </div>
              <div class="tab-pane fade" id="pills-notifications" role="tabpanel" aria-labelledby="pills-notifications-tab" tabindex="0">
              <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
              <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Checkup Records <span
                  class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2"><?php echo $result->num_rows?></span></h3>
              <!-- <form class="position-relative">
                <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh"
                  placeholder="Search Followers">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></i>
              </form> -->
            </div>
            <?php while ($row = $result->fetch_assoc()) {
              ?>
              <div class="card" id="cardHistory">
                <div class="position-relative">
                  <div class="p-4 rounded-2 bg-light mb-3">
                    <div class="d-flex align-items-center gap-3">
                      <img src="../dist/images/profile/user-3.jpg" alt="" class="rounded-circle" width="33" height="33">
                      <h6 class="fw-semibold mb-0 fs-4"><?php echo $row['nurseName'] ?></h6>
                      <span class="fs-2"><span class="p-1 bg-muted rounded-circle d-inline-block"></span> <?php echo $row['created_at']?></span>
                    </div>
                    <p class="my-3"> <span class="h5">Height</span> : <?php echo $row['height']?></p>
                    <p class="my-3"> <span class="h5">Weight</span> : <?php echo $row['weight']?></p>
                    <p class="my-3"> <span class="h5">Temperature</span> : <?php echo $row['temperature']?></p>
                    <p class="my-3"><span class="h5">Findings </span> : <?php echo  $row['findings'] !="" ? $row['findings'] : "None" ?>
                    </p>
                    <!-- <br> -->
                    <p class="my-3"><span class="h5">Prescriptions</span> :  <?php echo $row['prescription'] != "" ? $row['prescription'] : "None" ?>
                    </p>
                    
                  </div>
                </div>
              </div>
            <?php } ?>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <div class="dark-transparent sidebartoggler"></div>
  </div>
  <!--  Shopping Cart -->


  <!--  Mobilenavbar -->
  <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar" aria-labelledby="offcanvasWithBothOptionsLabel">
    <nav class="sidebar-nav scroll-sidebar">
      <div class="offcanvas-header justify-content-between">
        <img src="../dist/images/logos/favicon.ico" alt="" class="img-fluid">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body profile-dropdown mobile-navbar" data-simplebar="" data-simplebar>
        <ul id="sidebarnav">
          <li class="sidebar-item">
            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
              <span>
                <i class="ti ti-apps"></i>
              </span>
              <span class="hide-menu">Apps</span>
            </a>
            <ul aria-expanded="false" class="collapse first-level my-3">
              <li class="sidebar-item py-2">
                <a href="#" class="d-flex align-items-center">
                  <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                    <img src="../dist/images/svgs/icon-dd-chat.svg" alt="" class="img-fluid" width="24" height="24">
                  </div>
                  <div class="d-inline-block">
                    <h6 class="mb-1 bg-hover-primary">Chat Application</h6>
                    <span class="fs-2 d-block fw-normal text-muted">New messages arrived</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item py-2">
                <a href="#" class="d-flex align-items-center">
                  <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                    <img src="../dist/images/svgs/icon-dd-invoice.svg" alt="" class="img-fluid" width="24" height="24">
                  </div>
                  <div class="d-inline-block">
                    <h6 class="mb-1 bg-hover-primary">Invoice App</h6>
                    <span class="fs-2 d-block fw-normal text-muted">Get latest invoice</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item py-2">
                <a href="#" class="d-flex align-items-center">
                  <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                    <img src="../dist/images/svgs/icon-dd-mobile.svg" alt="" class="img-fluid" width="24" height="24">
                  </div>
                  <div class="d-inline-block">
                    <h6 class="mb-1 bg-hover-primary">Contact Application</h6>
                    <span class="fs-2 d-block fw-normal text-muted">2 Unsaved Contacts</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item py-2">
                <a href="#" class="d-flex align-items-center">
                  <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                    <img src="../dist/images/svgs/icon-dd-message-box.svg" alt="" class="img-fluid" width="24" height="24">
                  </div>
                  <div class="d-inline-block">
                    <h6 class="mb-1 bg-hover-primary">Email App</h6>
                    <span class="fs-2 d-block fw-normal text-muted">Get new emails</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item py-2">
                <a href="#" class="d-flex align-items-center">
                  <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                    <img src="../dist/images/svgs/icon-dd-cart.svg" alt="" class="img-fluid" width="24" height="24">
                  </div>
                  <div class="d-inline-block">
                    <h6 class="mb-1 bg-hover-primary">User Profile</h6>
                    <span class="fs-2 d-block fw-normal text-muted">learn more information</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item py-2">
                <a href="#" class="d-flex align-items-center">
                  <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                    <img src="../dist/images/svgs/icon-dd-date.svg" alt="" class="img-fluid" width="24" height="24">
                  </div>
                  <div class="d-inline-block">
                    <h6 class="mb-1 bg-hover-primary">Calendar App</h6>
                    <span class="fs-2 d-block fw-normal text-muted">Get dates</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item py-2">
                <a href="#" class="d-flex align-items-center">
                  <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                    <img src="../dist/images/svgs/icon-dd-lifebuoy.svg" alt="" class="img-fluid" width="24" height="24">
                  </div>
                  <div class="d-inline-block">
                    <h6 class="mb-1 bg-hover-primary">Contact List Table</h6>
                    <span class="fs-2 d-block fw-normal text-muted">Add new contact</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item py-2">
                <a href="#" class="d-flex align-items-center">
                  <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                    <img src="../dist/images/svgs/icon-dd-application.svg" alt="" class="img-fluid" width="24" height="24">
                  </div>
                  <div class="d-inline-block">
                    <h6 class="mb-1 bg-hover-primary">Notes Application</h6>
                    <span class="fs-2 d-block fw-normal text-muted">To-do and Daily tasks</span>
                  </div>
                </a>
              </li>
              <ul class="px-8 mt-7 mb-4">
                <li class="sidebar-item mb-3">
                  <h5 class="fs-5 fw-semibold">Quick Links</h5>
                </li>
                <li class="sidebar-item py-2">
                  <a class="fw-semibold text-dark" href="#">Pricing Page</a>
                </li>
                <li class="sidebar-item py-2">
                  <a class="fw-semibold text-dark" href="#">Authentication Design</a>
                </li>
                <li class="sidebar-item py-2">
                  <a class="fw-semibold text-dark" href="#">Register Now</a>
                </li>
                <li class="sidebar-item py-2">
                  <a class="fw-semibold text-dark" href="#">404 Error Page</a>
                </li>
                <li class="sidebar-item py-2">
                  <a class="fw-semibold text-dark" href="#">Notes App</a>
                </li>
                <li class="sidebar-item py-2">
                  <a class="fw-semibold text-dark" href="#">User Application</a>
                </li>
                <li class="sidebar-item py-2">
                  <a class="fw-semibold text-dark" href="#">Account Settings</a>
                </li>
              </ul>
            </ul>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="app-chat.html" aria-expanded="false">
              <span>
                <i class="ti ti-message-dots"></i>
              </span>
              <span class="hide-menu">Chat</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="app-calendar.html" aria-expanded="false">
              <span>
                <i class="ti ti-calendar"></i>
              </span>
              <span class="hide-menu">Calendar</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="app-email.html" aria-expanded="false">
              <span>
                <i class="ti ti-mail"></i>
              </span>
              <span class="hide-menu">Email</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <!--  Search Bar -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content rounded-1">
        <div class="modal-header border-bottom">
          <input type="search" class="form-control fs-3" placeholder="Search here" id="search" />
          <span data-bs-dismiss="modal" class="lh-1 cursor-pointer">
            <i class="ti ti-x fs-5 ms-3"></i>
          </span>
        </div>
        <div class="modal-body message-body" data-simplebar="">
          <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
          <ul class="list mb-0 py-2">
            <li class="p-1 mb-1 bg-hover-light-black">
              <a href="#">
                <span class="fs-3 text-black fw-normal d-block">Modern</span>
                <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
              </a>
            </li>
            <li class="p-1 mb-1 bg-hover-light-black">
              <a href="#">
                <span class="fs-3 text-black fw-normal d-block">Dashboard</span>
                <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
              </a>
            </li>
            <li class="p-1 mb-1 bg-hover-light-black">
              <a href="#">
                <span class="fs-3 text-black fw-normal d-block">Contacts</span>
                <span class="fs-3 text-muted d-block">/apps/contacts</span>
              </a>
            </li>
            <li class="p-1 mb-1 bg-hover-light-black">
              <a href="#">
                <span class="fs-3 text-black fw-normal d-block">Posts</span>
                <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
              </a>
            </li>
            <li class="p-1 mb-1 bg-hover-light-black">
              <a href="#">
                <span class="fs-3 text-black fw-normal d-block">Detail</span>
                <span class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
              </a>
            </li>
            <li class="p-1 mb-1 bg-hover-light-black">
              <a href="#">
                <span class="fs-3 text-black fw-normal d-block">Shop</span>
                <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
              </a>
            </li>
            <li class="p-1 mb-1 bg-hover-light-black">
              <a href="#">
                <span class="fs-3 text-black fw-normal d-block">Modern</span>
                <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
              </a>
            </li>
            <li class="p-1 mb-1 bg-hover-light-black">
              <a href="#">
                <span class="fs-3 text-black fw-normal d-block">Dashboard</span>
                <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
              </a>
            </li>
            <li class="p-1 mb-1 bg-hover-light-black">
              <a href="#">
                <span class="fs-3 text-black fw-normal d-block">Contacts</span>
                <span class="fs-3 text-muted d-block">/apps/contacts</span>
              </a>
            </li>
            <li class="p-1 mb-1 bg-hover-light-black">
              <a href="#">
                <span class="fs-3 text-black fw-normal d-block">Posts</span>
                <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
              </a>
            </li>
            <li class="p-1 mb-1 bg-hover-light-black">
              <a href="#">
                <span class="fs-3 text-black fw-normal d-block">Detail</span>
                <span class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
              </a>
            </li>
            <li class="p-1 mb-1 bg-hover-light-black">
              <a href="#">
                <span class="fs-3 text-black fw-normal d-block">Shop</span>
                <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--  Customizer -->
  <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
    <i class="ti ti-settings fs-7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Settings"></i>
  </button>
  <div class="offcanvas offcanvas-end customizer" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" data-simplebar="">
    <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
      <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">Settings</h4>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
      <div class="theme-option pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Theme Option</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="javascript:void(0)" onclick="toggleTheme('../dist/css/style.min.css')" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 light-theme text-dark">
            <i class="ti ti-brightness-up fs-7 text-primary"></i>
            <span class="text-dark">Light</span>
          </a>
          <a href="javascript:void(0)" onclick="toggleTheme('../dist/css/style-dark.min.css')" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 dark-theme text-dark">
            <i class="ti ti-moon fs-7 "></i>
            <span class="text-dark">Dark</span>
          </a>
        </div>
      </div>
      <div class="theme-direction pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Theme Direction</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="./../index.php" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
            <i class="ti ti-text-direction-ltr fs-6 text-primary"></i>
            <span class="text-dark">LTR</span>
          </a>
          <a href="../rtl/../index.php" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
            <i class="ti ti-text-direction-rtl fs-6 text-dark"></i>
            <span class="text-dark">RTL</span>
          </a>
        </div>
      </div>
      <div class="theme-colors pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Theme Colors</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <ul class="list-unstyled mb-0 d-flex gap-3 flex-wrap change-colors">
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin1-bluetheme-primary active-theme " onclick="toggleTheme('../dist/css/style.min.css')" data-color="blue_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="BLUE_THEME"><i class="ti ti-check text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin2-aquatheme-primary " onclick="toggleTheme('../dist/css/style-aqua.min.css')" data-color="aqua_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="AQUA_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin3-purpletheme-primary" onclick="toggleTheme('../dist/css/style-purple.min.css')" data-color="purple_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PURPLE_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin4-greentheme-primary" onclick="toggleTheme('../dist/css/style-green.min.css')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin5-cyantheme-primary" onclick="toggleTheme('../dist/css/style-cyan.min.css')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CYAN_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin6-orangetheme-primary" onclick="toggleTheme('../dist/css/style-orange.min.css')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="layout-type pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Layout Type</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="./../index.php" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
            <i class="ti ti-layout-sidebar fs-6 text-primary"></i>
            <span class="text-dark">Vertical</span>
          </a>
          <a href="../horizontal/../index.php" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
            <i class="ti ti-layout-navbar fs-6 text-dark"></i>
            <span class="text-dark">Horizontal</span>
          </a>
        </div>
      </div>
      <div class="container-option pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Container Option</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 boxed-width text-dark">
            <i class="ti ti-layout-distribute-vertical fs-7 text-primary"></i>
            <span class="text-dark">Boxed</span>
          </a>
          <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 full-width text-dark">
            <i class="ti ti-layout-distribute-horizontal fs-7"></i>
            <span class="text-dark">Full</span>
          </a>
        </div>
      </div>
      <div class="sidebar-type pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Sidebar Type</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 fullsidebar">
            <i class="ti ti-layout-sidebar-right fs-7"></i>
            <span class="text-dark">Full</span>
          </a>
          <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center text-dark sidebartoggler gap-2">
            <i class="ti ti-layout-sidebar fs-7"></i>
            <span class="text-dark">Collapse</span>
          </a>
        </div>
      </div>
      <div class="card-with pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Card With</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 text-dark cardborder">
            <i class="ti ti-border-outer fs-7"></i>
            <span class="text-dark">Border</span>
          </a>
          <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 cardshadow">
            <i class="ti ti-border-none fs-7"></i>
            <span class="text-dark">Shadow</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <?php include_once("./include/extra.php"); ?>
  <!--  Customizer -->
  <?php include_once("./include/scripts.php"); ?>
  <script src="../dist/libs/moment-js/moment.js"></script>
  <script src="../dist/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#nurse_city").val("<?php echo $nurse_details['city']; ?>").trigger("change");
      $("#nurse_sex").val("<?php echo $nurse_details['sex']; ?>").trigger("change");

      <?php if (isset($_SESSION['notyMessage'])) { ?>
        noty.setText("<?php echo $_SESSION['notyMessage']; ?>", true);
        noty.setType("success", true);
        noty.show();
      <?php unset($_SESSION['notyMessage']);
      } ?>

      $('#changePassword').submit(function(event) {
        event.preventDefault();
        var form = $(this);
        console.log(this);
        if (form[0].checkValidity() === false) {
          event.stopPropagation();
        } else {
          // Submit the form
          var formdata = new FormData(this);
          formdata.append("function", "changePassword");
          formdata.append("id", <?php echo $nurse_details['id'] ?>);
          formdata.append("userID", "<?php echo $_SESSION['userID'] ?>")
          $.ajax({
            url: "../controller/loginController.php",
            type: "POST",
            data: formdata,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {
              console.log(data.success);

              if (data.success == "true") {
                window.location.href = "accountPage.php";
              } else {
                noty.setText(data.message, true);
                noty.setType("error", true);
                <?php unset($_SESSION['notyMessage']); ?>
                noty.show();
              }
            },
            error: function(data) {
              noty.setText("Error", true);
              noty.setType("error", true);
              <?php unset($_SESSION['notyMessage']); ?>
              noty.show();
            }
          });
        }
        form.addClass('was-validated');
      });

      <?php
      if ($_SESSION['user_type'] == "nurse") { ?>
        $('#nurseForm').submit(function(event) {
          event.preventDefault();
          var form = $(this);
          if (form[0].checkValidity() === false) {
            event.stopPropagation();
          } else {
            // Submit the form
            var formdata = new FormData(this);
            formdata.append("function", "updateNurse");
            formdata.append("id", <?php echo $nurse_details['id'] ?>);

            $.ajax({
              url: "../controller/nurseController.php",
              type: "POST",
              data: formdata,
              contentType: false,
              processData: false,
              success: function(data) {
                console.log(data);
                //trim data
                data = data.trim();
                console.log(data)
                if (data == "success") {
                  window.location.href = "accountPage.php";
                } else {
                  noty.setText("Error", true);
                  noty.setType("error", true);
                  noty.show();
                }

              },
              error: function(data) {
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
      <?php } else if ($_SESSION['user_type'] == 'student') { ?>
        $('#studentForm').submit(function(event) {
          event.preventDefault();
          var form = $(this);
          if (form[0].checkValidity() === false) {
            event.stopPropagation();
          } else {
            // Submit the form
            var formdata = new FormData(this);
            formdata.append("function", "updateStudent");
            formdata.append("id", <?php echo $student_details['id'] ?>);

            $.ajax({
              url: "../controller/studentController.php",
              type: "POST",
              data: formdata,
              contentType: false,
              processData: false,
              dataType: "json",
              success: function(data) {

                console.log(data)

                if (data.success == 'true') {
                  window.location.href = "accountPage.php";
                } else {
                  if (data.errorCode == 1062) {
                    let duplicate = data.errorMessage.split("'");
                    noty.setText("Error : " + duplicate[1] + " already exist for " + duplicate[3] + " attribute", true);
                    // noty.setText("Error : Email already exist", true);
                    noty.setType("error", true);
                    noty.show();
                  } else {
                    noty.setText("Error : " + data.errorCode, true);
                    noty.setType("error", true);
                    noty.show();
                  }

                }

              },
              error: function(data) {
                // data = data.trim();
                console.log(data);
                noty.setText("Error", true);
                noty.setType("error", true);
                noty.show();
              }
            });
          }
          form.addClass('was-validated');
        });
      <?php }

      ?>






    });
    jQuery(".mydatepicker, #datepicker, .input-group.date").datepicker({
      format: "yyyy-mm-dd",
    });
  </script>
</body>

</html>