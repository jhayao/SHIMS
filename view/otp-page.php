<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_POST) && !empty($_POST)) {
  $otp = $_POST['t1'] . $_POST['t2'] . $_POST['t3'] . $_POST['t4'] . $_POST['t5'] . $_POST['t6'];
  require_once('../controller/database.php');
  $id = $_SESSION['userID'];
  $db = new Connection();
  $conn = $db->connect();
  $stmt = $conn->prepare("select * from otp where user_id = ? and otp = ?  order by created_at desc limit 1");
  $stmt->bind_param("is", $id, $otp);
  $stmt->execute();
  $error = "";
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $validAt = strtotime($data['valid_at']);
    $currentDate = strtotime(date('Y-m-d'));

    if ($validAt >= $currentDate) {
      $_SESSION['userInfo']['isVerified'] = true;
      header('Location: ./dashboard.php');
    } else {
      $error = "Expired OTP";
    }
  }
  else {
    $error = "Invalid OTP";
  }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!--  Title -->
  <title>Mordenize</title>
  <!--  Required Meta Tag -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="handheldfriendly" content="true" />
  <meta name="MobileOptimized" content="width" />
  <meta name="description" content="Mordenize" />
  <meta name="author" content="" />
  <meta name="keywords" content="Mordenize" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!--  Favicon -->
  <link rel="shortcut icon" type="image/png" href="../dist/images/logos/deped.svg" />
  <!-- Core Css -->
  <link id="themeColors" rel="stylesheet" href="../dist/css/style.min.css" />
  <link rel="stylesheet" href="../dist/libs/sweetalert2/dist/sweetalert2.min.css">
</head>

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
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100">
      <div class="position-relative z-index-5">
        <div class="row">
          <div class="col-lg-6 col-xl-8 col-xxl-8">
            <a href="./index.php" class="text-nowrap logo-img d-block px-4 py-9 w-100">
              <img src="../dist/images/logos/dark-logo.svg" width="180" alt="">
            </a>
            <div class="d-none d-lg-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
              <img src="../dist/images/backgrounds/login-security.svg" alt="" class="img-fluid" width="500">
            </div>
          </div>
          <div class="col-lg-6 col-xl-4 col-xxl-4">
            <div class="card mb-0 shadow-none rounded-0 min-vh-100 h-100">
              <div class="d-flex align-items-center w-100 h-100">
                <div class="card-body">
                  <div class="mb-5">
                    <h3 class="fw-bolder fs-7 mb-3">Two Step Verification</h3>
                    <p>We sent a verification code to your mobile. Enter the code from the mobile in the field below.
                    </p>
                    <h6 class="fw-bolder">
                      <?php print_r(preg_replace('/(?<=.{3}).(?=.*@)/', '*', $_SESSION['userInfo']['email'])) ?>
                    </h6>
                  </div>
                  <form method="post" action="otp-page.php">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label fw-semibold">Type your 6 digits security
                        code</label>
                      <div class="d-flex align-items-center gap-2 gap-sm-3">
                        <input type="text" name="t1" class="form-control" maxlength="1" placeholder=""
                          onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        <input type="text" name="t2" class="form-control" maxlength="1" placeholder=""
                          onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        <input type="text" name="t3" class="form-control" maxlength="1" placeholder=""
                          onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        <input type="text" name="t4" class="form-control" maxlength="1" placeholder=""
                          onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        <input type="text" name="t5" class="form-control" maxlength="1" placeholder=""
                          onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        <input type="text" name="t6" class="form-control" maxlength="1" placeholder=""
                          onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4">Verify My Account</button>
                    <div class="d-flex align-items-center">
                      <p class="fs-4 mb-0 text-dark">Didn't get the code?</p>
                      <a class="text-primary fw-medium ms-2" href="javascript:void(0)">Resend</a>
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

  <!--  Import Js Files -->
  <script src="../dist/libs/jquery/dist/jquery.min.js"></script>
  <script src="../dist/libs/simplebar/dist/simplebar.min.js"></script>
  <script src="../dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--  core files -->
  <script src="../dist/js/app.min.js"></script>
  <script src="../dist/js/app.init.js"></script>
  <script src="../dist/js/app-style-switcher.js"></script>
  <script src="../dist/js/sidebarmenu.js"></script>
  <script src="../dist/libs/sweetalert2/dist/sweetalert2.min.js"></script>

  <script src="../dist/js/custom.js"></script>
  <script>
    $('input').on('input', function () {

      if ($(this).val().length == $(this).attr('maxlength')) {
        $(this).next('input').focus();
      }
    });
    <?php echo (isset($error) && $error != "") ? "Swal.fire({
      title: 'Opps...',
      text: '" . $error . "',
      icon: 'error'
    });" : "" ?>

  </script>
</body>

</html>