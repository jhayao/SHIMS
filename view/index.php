<?php 
    session_start();
    if(!isset($_SESSION['user_type'])){
        header('location: login.php');
    }
    else if ($_SESSION['userInfo']['isVerified'] == false){
        header('location: otp-page.php');
    }
    else{
        header('location: dashboard.php');
    }
?>