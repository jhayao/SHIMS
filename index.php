<?php 
    session_start();
    if(!isset($_SESSION['user_type'])){
        header('location: view/login.php');
    }
    else{
        header('location: view/dashboard.php');
    }
?>