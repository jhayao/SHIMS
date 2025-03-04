<?php //status of sesssion
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
// print_r($_SESSION);
unset($_SESSION);
// if($_SESSION['userInfo']['isVerified'] == false && isset($_SESSION['userInfo']['isVerified'])){
//   unset($_SESSION);
// }

if (isset($_SESSION['user_type'])) {
  header('location: index.php');
}
?>

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/authentication-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Jul 2023 11:15:11 GMT -->

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
  <link rel="shortcut icon" type="image/png"
    href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" />
  <!-- Core Css -->
  <link id="themeColors" rel="stylesheet" href="../dist/css/style.min.css" />
  <link rel="stylesheet" href="../dist/libs/sweetalert2/dist/sweetalert2.min.css">
</head>

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
    <div class="position-relative overflow-hidden radial-gradient min-vh-100">
      <div class="position-relative z-index-5">
        <div class="row">
          <div class="col-xl-7 col-xxl-8">
            <a href="../index.php" class="text-nowrap logo-img d-block px-4 py-9 w-100">
              <img src="../dist/images/backgrounds/deped.svg" width="180" alt="">
            </a>
            <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
              <img
                src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/login-security.svg"
                alt="" class="img-fluid" width="500">
            </div>
          </div>
          <div class="col-xl-5 col-xxl-4">
            <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
              <div class="col-sm-8 col-md-6 col-xl-9">
                <h2 class="mb-3 fs-7 fw-bolder">Welcome to Modernize</h2>
                <p class=" mb-9">Your Admin Dashboard</p>
                <!-- <div class="row">
                    <div class="col-6 mb-2 mb-sm-0">
                      <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/google-icon.svg" alt="" class="img-fluid me-2" width="18" height="18">
                        <span class="d-none d-sm-block me-1 flex-shrink-0">Sign in with</span>Google
                      </a>
                    </div>
                    <div class="col-6">
                      <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/facebook-icon.svg" alt="" class="img-fluid me-2" width="18" height="18">
                        <span class="d-none d-sm-block me-1 flex-shrink-0">Sign in with</span>FB
                      </a>
                    </div>
                  </div> -->
                <!-- <div class="position-relative text-center my-4">
                    <p class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">or sign in with</p>
                    <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                  </div> -->
                <form>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                      required>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" required>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                    <a class="text-primary fw-medium" href="authentication-forgot-password.html">Forgot Password ?</a>
                  </div>
                  <button id="signIn" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <!-- <p class="fs-4 mb-0 fw-medium">New to Modernize?</p>
                    <a class="text-primary fw-medium ms-2" href="authentication-register.html">Create an account</a> -->
                  </div>
                </form>
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

  <script src="../dist/js/custom.js"></script>

  <script src="../dist/libs/sweetalert2/dist/sweetalert2.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#signIn').click(function (e) {
        e.preventDefault();
        var email = $('#exampleInputEmail1').val();
        var password = $('#exampleInputPassword1').val();
        $.ajax({
          url: '../controller/loginController.php',
          type: 'POST',
          dataType: 'json',
          data: {
            email: email,
            password: password,
            function: 'loginUser'
          },
          success: function (data) {
            console.log(data)
            if (data.success == "true") {

              console.log(data)
              window.location.href = "../view/otp-page.php";

            } else {
              alert('Invalid Username or Password');
            }
          }
        });
      })
    });
  </script>
</body>

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/authentication-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Jul 2023 11:15:11 GMT -->

</html>