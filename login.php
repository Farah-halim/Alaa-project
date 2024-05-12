<?php
include("user_connection.php");

if (!isset($_SESSION)){
    session_start();
}

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $error = array();
    
    if(empty($email)){
        array_push($error,"email is required");
    }

    if(empty($password)){
        array_push($error,"password is required");
    }

    if ((count($error)==0)){
    $sql = "SELECT email, password FROM user WHERE email='$email' AND password='$password' ";
    $result = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result)==1) {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header("Location: index1.php");
    } 
    else {
        echo "Incorrect email or password.";
    }
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
                <button type="submit" class="btn-contact" name="submit" > Submit </button>
            </form>
            <a href="signup.php"> Click here to Register .. </a>

        </div>
        <div class="form-photo">
            <img src="images/loading1.gif" alt="">
        </div>
    </div>
</div>

</body>
</html>