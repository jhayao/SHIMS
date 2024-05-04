<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id == '' || !isset($id)) {
  header('Location: dashboard.php');
}
include_once ('../controller/database.php');
$id = isset($_GET['id']) ? $_GET['id'] : '';
$query = "select * from division as d1 where d1.id = ?";
$connection = new Connection();
$conn = $connection->connect();
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
$conn->close();
$row = $result->fetch_assoc();

// $address = $row['street'] . ", " . $row['barangay'] . ", " . $row['city'] . ", " . $row['province'] . ", " . $row['postal'];




?><?php include_once ('include/head.php'); ?>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <img src="../dist/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <!-- --------------------------------------------------- -->
  <!-- Body Wrapper -->
  <!-- --------------------------------------------------- -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- --------------------------------------------------- -->
    <!-- Sidebar -->
    <!-- --------------------------------------------------- -->
    <?php include_once ('include/sidebar.php'); ?>
    <!-- --------------------------------------------------- -->
    <!-- Main Wrapper -->
    <!-- --------------------------------------------------- -->
    <div class="body-wrapper">
      <!-- --------------------------------------------------- -->
      <!-- Header Start -->
      <!-- --------------------------------------------------- -->
      <?php include_once ('include/header.php'); ?>
      <!-- --------------------------------------------------- -->
      <!-- Header End -->
      <!-- --------------------------------------------------- -->
      <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
          <div class="card-body px-4 py-3">
            <div class="row align-items-center">
              <div class="col-9">
                <h4 class="fw-semibold mb-8">Division Profile</h4>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-muted " href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Division Profile</li>
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
        <div class="card overflow-hidden">
          <div class="card-body p-0">
            <img src="../dist/images/backgrounds/profilebg.jpg" alt="" class="img-fluid">
            <div class="row align-items-center">
              <div class="col-lg-4 order-lg-1 order-2">
                <!-- <div class="d-flex align-items-center justify-content-around m-4">
                    <div class="text-center">
                      <i class="ti ti-file-description fs-6 d-block mb-2"></i>
                      <h4 class="mb-0 fw-semibold lh-1">938</h4>
                      <p class="mb-0 fs-4">Posts</p>
                    </div>
                    <div class="text-center">
                      <i class="ti ti-user-circle fs-6 d-block mb-2"></i>
                      <h4 class="mb-0 fw-semibold lh-1">3,586</h4>
                      <p class="mb-0 fs-4">Followers</p>
                    </div>
                    <div class="text-center">
                      <i class="ti ti-user-check fs-6 d-block mb-2"></i>
                      <h4 class="mb-0 fw-semibold lh-1">2,659</h4>
                      <p class="mb-0 fs-4">Following</p>
                    </div>
                  </div> -->
              </div>
              <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                <div class="mt-n5">
                  <div class="d-flex align-items-center justify-content-center mb-2">
                    <div class="linear-gradient d-flex align-items-center justify-content-center rounded-circle"
                      style="width: 110px; height: 110px;" ;>
                      <div
                        class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                        style="width: 100px; height: 100px;" ;>
                        <img src="../dist/images/profile/user-1.jpg" alt="" class="w-100 h-100">
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <h5 class="fs-5 mb-0 fw-semibold" id="fullName"></h5>
                    <p class="mb-0 fs-4" id="userType"></p>
                  </div>
                </div>
              </div>
              <!-- <div class="col-lg-4 order-last">
                  <ul class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-start my-3 gap-3">
                    <li class="position-relative">
                      <a class="text-white d-flex align-items-center justify-content-center bg-primary p-2 fs-4 rounded-circle" href="javascript:void(0)" width="30" height="30">
                        <i class="ti ti-brand-facebook"></i>
                      </a>
                    </li>
                    <li class="position-relative">
                      <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle " href="javascript:void(0)">
                        <i class="ti ti-brand-twitter"></i>
                      </a>
                    </li>
                    <li class="position-relative">
                      <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle " href="javascript:void(0)">
                        <i class="ti ti-brand-dribbble"></i>
                      </a>
                    </li>
                    <li class="position-relative">
                      <a class="text-white bg-danger d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle " href="javascript:void(0)">
                        <i class="ti ti-brand-youtube"></i>
                      </a>
                    </li>
                    <li><button class="btn btn-primary">Add To Story</button></li>
                  </ul>
                </div> -->
            </div>
            <ul class="nav nav-pills user-profile-tab justify-content-end mt-2 bg-light-info rounded-2" id="pills-tab"
              role="tablist">
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                  id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab"
                  aria-controls="pills-profile" aria-selected="true">
                  <i class="ti ti-user-circle me-2 fs-6"></i>
                  <span class="d-none d-md-block">Profile</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <!-- <button
                  class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                  id="pills-followers-tab" data-bs-toggle="pill" data-bs-target="#pills-followers" type="button"
                  role="tab" aria-controls="pills-followers" aria-selected="false">
                  <i class="ti ti-heart me-2 fs-6"></i>
                  <span class="d-none d-md-block">Records</span>
                </button> -->
              </li>
              <!-- <li class="nav-item" role="presentation">
                  <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-friends-tab" data-bs-toggle="pill" data-bs-target="#pills-friends" type="button" role="tab" aria-controls="pills-friends" aria-selected="false">
                    <i class="ti ti-user-circle me-2 fs-6"></i>
                    <span class="d-none d-md-block">Prescription</span> 
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-gallery-tab" data-bs-toggle="pill" data-bs-target="#pills-gallery" type="button" role="tab" aria-controls="pills-gallery" aria-selected="false">
                    <i class="ti ti-photo-plus me-2 fs-6"></i>
                    <span class="d-none d-md-block">Gallery</span> 
                  </button>
                </li> -->
            </ul>
          </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
            tabindex="0">
            <div class="row">
              <div class="col-lg-12">
                <div class="card shadow-none border">
                  <div class="card-body">
                    <h4 class="fw-semibold mb-3">Introduction</h4>
                    <p>This is the details of Division Name: <strong><?= $row['division_name'] ?></strong></p>
                    <ul class="list-unstyled mb-0">
                      <!-- <li class="d-flex align-items-center gap-3 mb-2">
                        <h6>District Name: </h6>
                        <h6 class="fs-4 fw-semibold " id="schoolName">
                          <?php //echo $row['district_name'] ?>
                        </h6>
                      </li> -->
                      <!-- <li class="d-flex align-items-center gap-3 mb-2">
                        <h6>Division Name: </h6>
                        <h6 class="fs-4 fw-semibold " id="schoolName">
                          <?php //echo $row['division_name'] ?>
                        </h6>
                      </li> -->
                      <li class="d-flex align-items-center gap-3 mb-2">
                        <h6>Address: </h6>
                        <h6 class="fs-4 fw-semibold " id="schoolName">
                          <?php echo $row['address'] ?>
                        </h6>
                      </li>
                      <!-- <li class="d-flex align-items-center gap-3 mb-4">
                        <i class="ti ti-map-pin text-dark fs-6"></i>
                        <h6 class="fs-4 fw-semibold mb-0" id="address">
                          <?php echo $address ?>
                        </h6>
                      </li>
                      <li class="d-flex align-items-center gap-3 mb-4">
                        <i class="ti ti-phone-call text-dark fs-6"></i>
                        <h6 class="fs-4 fw-semibold mb-0" id="contact">
                          <?php echo $row['contact'] ?>
                        </h6>
                      </li> -->
                    </ul>
                  </div>
                </div>

              </div>

            </div>
          </div>
          <div class="tab-pane fade" id="pills-followers" role="tabpanel" aria-labelledby="pills-followers-tab"
            tabindex="0">
            <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
              <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Checkup Records <span
                  class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2"><?php echo $result->num_rows ?></span>
              </h3>
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
                      <span class="fs-2"><span class="p-1 bg-muted rounded-circle d-inline-block"></span>
                        <?php echo $row['created_at'] ?></span>
                    </div>
                    <p class="my-3"> <span class="h5">Height</span> : <?php echo $row['height'] ?> meters</p>
                    <p class="my-3"> <span class="h5">Weight</span> : <?php echo $row['weight'] ?> kilograms</p>
                    <p class="my-3"> <span class="h5">Temperature</span> : <?php echo $row['temperature'] ?>&deg;C</p>
                    <p class="my-3"> <span class="h5">BMI</span> : <?php echo $row['BMI'] ?></p>
                    <p class="my-3"> <span class="h5">Heart Rate</span> : <?php echo $row['heart_rate'] ?></p>
                    <p class="my-3"> <span class="h5">Height for Age</span> : <?php echo $row['height_for_age'] ?></p>
                    <p class="my-3"> <span class="h5">Vision Screening</span> : <?php echo $row['vision_screening'] ?></p>
                    <p class="my-3"> <span class="h5">Auditory Screening</span> : <?php echo $row['auditory_screening'] ?>
                    </p>
                    <p class="my-3"> <span class="h5">Skin/Scalp</span> : <?php echo $row['skin_scalp'] ?></p>
                    <p class="my-3"> <span class="h5">Eyes/Ear/Nose</span> : <?php echo $row['eyes_ear_nose'] ?></p>
                    <p class="my-3"> <span class="h5">Mouth/Throat/Neck</span> : <?php echo $row['mouth_throat_neck'] ?>
                    </p>
                    <p class="my-3"> <span class="h5">Lungs/Heart</span> : <?php echo $row['lungs_heart'] ?></p>
                    <p class="my-3"> <span class="h5">Abdomen</span> : <?php echo $row['abdomen'] ?></p>
                    <p class="my-3"> <span class="h5">Deformities</span> : <?php echo $row['deformities'] ?></p>
                    <p class="my-3"> <span class="h5">Immunization</span> : <?php echo $row['immunization'] ?></p>
                    <p class="my-3"> <span class="h5">Iron Supplementation</span> :
                      <?php echo $row['iron_supplementation'] == 1 ? "Yes" : "No" ?>
                    </p>

                    <p class="my-3"> <span class="h5">Deworming</span> :
                      <?php echo $row['deworming'] == 1 ? "Yes" : "No" ?>
                    </p>
                    <p class="my-3"> <span class="h5">SBFP Beneficiary</span> :
                      <?php echo $row['sbfp_beneficiary'] == 1 ? "Yes" : "No" ?>
                    </p>
                    <p class="my-3"> <span class="h5">4P's Beneficiary</span> :
                      <?php echo $row['fourps_beneficiary'] == 1 ? "Yes" : "No" ?>
                    </p>
                    <p class="my-3"> <span class="h5">Menarche</span> :
                      <?php echo $row['menarche'] == 1 ? "Yes" : "No" ?>
                    </p>
                    <p class="my-3"> <span class="h5">Others</span> : <?php echo $row['others'] ?></p>

                    </p>

                  </div>
                </div>
              </div>
            <?php } ?>
          </div>

        </div>
      </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <div class="dark-transparent sidebartoggler"></div>
  </div>
  <!--  Shopping Cart -->
  <div class="offcanvas offcanvas-end shopping-cart" tabindex="-1" id="offcanvasRight"
    aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header py-4">
      <h5 class="offcanvas-title fs-5 fw-semibold" id="offcanvasRightLabel">Shopping Cart</h5>
      <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
    </div>
    <div class="offcanvas-body h-100 px-4 pt-0" data-simplebar>
      <ul class="mb-0">
        <li class="pb-7">
          <div class="d-flex align-items-center">
            <img src="../dist/images/products/product-1.jpg" width="95" height="75" class="rounded-1 me-9 flex-shrink-0"
              alt="" />
            <div>
              <h6 class="mb-1">Supreme toys cooker</h6>
              <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
              <div class="d-flex align-items-center justify-content-between mt-2">
                <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                <div class="input-group input-group-sm w-50">
                  <button class="btn border-0 round-20 minus p-0 bg-light-success text-success " type="button"
                    id="add1"> - </button>
                  <input type="text"
                    class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty"
                    placeholder="" aria-label="Example text with button addon" aria-describedby="add1" value="1" />
                  <button class="btn text-success bg-light-success  p-0 round-20 border-0 add" type="button" id="addo2">
                    + </button>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="pb-7">
          <div class="d-flex align-items-center">
            <img src="../dist/images/products/product-2.jpg" width="95" height="75" class="rounded-1 me-9 flex-shrink-0"
              alt="" />
            <div>
              <h6 class="mb-1">Supreme toys cooker</h6>
              <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
              <div class="d-flex align-items-center justify-content-between mt-2">
                <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                <div class="input-group input-group-sm w-50">
                  <button class="btn border-0 round-20 minus p-0 bg-light-success text-success " type="button"
                    id="add2"> - </button>
                  <input type="text"
                    class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty"
                    placeholder="" aria-label="Example text with button addon" aria-describedby="add2" value="1" />
                  <button class="btn text-success bg-light-success  p-0 round-20 border-0 add" type="button"
                    id="addon34"> + </button>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="pb-7">
          <div class="d-flex align-items-center">
            <img src="../dist/images/products/product-3.jpg" width="95" height="75" class="rounded-1 me-9 flex-shrink-0"
              alt="" />
            <div>
              <h6 class="mb-1">Supreme toys cooker</h6>
              <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
              <div class="d-flex align-items-center justify-content-between mt-2">
                <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                <div class="input-group input-group-sm w-50">
                  <button class="btn border-0 round-20 minus p-0 bg-light-success text-success " type="button"
                    id="add3"> - </button>
                  <input type="text"
                    class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty"
                    placeholder="" aria-label="Example text with button addon" aria-describedby="add3" value="1" />
                  <button class="btn text-success bg-light-success  p-0 round-20 border-0 add" type="button"
                    id="addon3"> + </button>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
      <div class="align-bottom">
        <div class="d-flex align-items-center pb-7">
          <span class="text-dark fs-3">Sub Total</span>
          <div class="ms-auto">
            <span class="text-dark fw-semibold fs-3">$2530</span>
          </div>
        </div>
        <div class="d-flex align-items-center pb-7">
          <span class="text-dark fs-3">Total</span>
          <div class="ms-auto">
            <span class="text-dark fw-semibold fs-3">$6830</span>
          </div>
        </div>
        <a href="./eco-checkout.html" class="btn btn-outline-primary w-100">Go to shopping cart</a>
      </div>
    </div>
  </div>
  <!--  Mobilenavbar -->
  <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
    aria-labelledby="offcanvasWithBothOptionsLabel">
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
                    <img src="../dist/images/svgs/icon-dd-message-box.svg" alt="" class="img-fluid" width="24"
                      height="24">
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
                    <h6 class="mb-1 bg-hover-primary">School Profile</h6>
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
                    <img src="../dist/images/svgs/icon-dd-application.svg" alt="" class="img-fluid" width="24"
                      height="24">
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
                <span
                  class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
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
                <span
                  class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
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
  <!-- --------------------------------------------------- -->
  <!-- Customizer -->

  <?php include_once ("./include/extra.php"); ?>
  <!--  Customizer -->


  <?php include_once ("./include/scripts.php"); ?>

  <script src="../dist/js/custom.js"></script>
  <!-- ---------------------------------------------- -->
  <!-- current page js files -->
  <!-- ---------------------------------------------- -->
  <script src="../dist/js/apps/chat.js"></script>


  <script>
    $(document).ready(function () {
      $.ajax({
        url: "../controller/checkupController.php",
        type: "POST",
        dataType: "json",
        data: {
          "student_id": "<?php echo $_GET['id'] ?>",
          "function": "getCheckupbyStudentId"
        },
        success: function (data) {
          const cardHistory = $("#cardHistory");
          const cloneDiv = cardHistory.cloneNode(true);
          data.forEach(function (item) {
            document.body.appendChild(cloneDiv);
            console.log(item);
          });
        }
      })
    });
  </script>

</body>

</html>