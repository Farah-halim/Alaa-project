<?php
include("user_connection.php");

if (!isset($_SESSION)){
    session_start();
}

$check_error = 0;

if ( isset($_POST['submit']) ) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "You cant skip anything";
        $check_error = 1;
    }

    if (strlen($_POST["password"]) < 8) {
        die("Password must be at least 8 characters long.");
        $check_error = 1;
    }

    if ($_POST["password"] !== $_POST["confirm_password"]) {
        die("Password and confirm password must be matched.");
        $check_error = 1;
    }

    if ($check_error == 0) {
        $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password' )";
        mysqli_query($con, $sql);
        header("Location: signup_success.php");
    } 
    else {
        echo "error";
    }
}
?>