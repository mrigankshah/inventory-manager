<?php



include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start(); // Our custom secure way of starting a PHP session.

if (isset($_POST['emp_id'], $_POST['p'])) {
    $emp_id = filter_input(INPUT_POST, 'emp_id', FILTER_SANITIZE_NUMBER_INT);
    $password = $_POST['p']; // The hashed password.
    
    if (login($emp_id, $password, $mysqli) == true) {
        // Login success 
        $_SESSION['emp_id'] = $emp_id;
        header("Location: ../products.php");
        exit();
    } else {
        // Login failed 
        header('Location: ../index.php?error=1');
        exit();
    }
} else {
    // The correct POST variables were not sent to this page. 
    header('Location: ../error.php?err=Could not process login');
    exit();
}