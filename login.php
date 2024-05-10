<?php
session_start();
include("database.php");

if (isset($_POST['email'], $_POST['password'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT email, password FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header("Location: home.php");
        exit();
    } else {
        echo "Incorrect email or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/login.css">
</head>

<body>
<div class="box">
    <div class="container">
        <div class="content">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <input type="email" placeholder="Email" name="email" id="email" required>
                <input type="password" placeholder="Password" name="password" id="password" required>
                <button type="submit" class="btn-contact" name="submit" value="Login">Submit</button>
            </form>
        </div>
        <div class="form-photo">
            <img src="images/loading1.gif" alt="">
        </div>
    </div>
    <a href="signup.php"> Click here to Sign up </a>
</div>

</body>
</html>
