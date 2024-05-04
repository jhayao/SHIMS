<?php //status of sesssion
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_type'])) {
    header('location: login.php');
} else if ($_SESSION['userInfo']['isVerified'] == false && isset($_SESSION['userInfo']['isVerified'])) {
    header('location: otp-page.php');
}
?>

<head>
    <!--  Title -->
    <title>NMSCSTSHIMS</title>
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
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="../dist/libs/owl.carousel/dist/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="../dist/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css" />

    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="../dist/css/style.min.css" />
    <!-- <link rel="stylesheet" href="../dist/libs/flatpickr/dist/flatpickr.min.css"> -->
    <link rel="stylesheet" href="../dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../dist/libs/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css"
        href=https://cdn.datatables.net/searchpanes/2.1.1/css/searchPanes.dataTables.min.css>
</head>

<style>
    .ck-editor__editable_inline {
        min-height: 250px;
    }
</style>
</head>