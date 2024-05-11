<?php
include("database.php");
$check_error = 0;

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "You cant skip anything empty";
        $check_error = 1;
    }

    if (strlen($_POST["password"]) < 8) {
        die("Password must be at least 8 characters long. Please go back to continue.");
        $check_error = 1;
    }

    if ($_POST["password"] !== $_POST["confirm_password"]) {
        die("Password and confirm password must match. Please go back to continue.");
        $check_error = 1;
    }

    if ($check_error == 0) {
        $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password' )";
        mysqli_query($con, $sql);
        header("Location: signup_success.php");
        exit(); 
    } 
    else {
        echo "error";
    }
}
?>