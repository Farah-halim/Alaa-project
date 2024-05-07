<?php
$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST")
{
  $mysqli = require __DIR__ . "/database.php";
  $sql = sprintf("SELECT * FROM user WHERE email = '%s'", $mysqli->real_escape_string($_POST["email"]));
  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();

  if($user)
  {
    if(password_verify($_POST["password"], $user["password_hash"]))
    {
      session_start();
      session_regenerate_id();
      $_SESSION["user_id"] = $user["id"];
      header("Location: index.php");
      exit;
    }
  }
  $is_invalid = true;
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
  <?php 
  if($is_invalid){
    die(" Invalid Email or Password ") ;
  }
 ?>

  <div class="box">
        <div class="container">
                <div class="content">
                    <h2>Login</h2>
                    <form method="post">
                        <input type="email" placeholder="Email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                        <input type="password" placeholder="Password" name="password" id="password">
                        <button type="submit" class="btn-contact"> Login </button>  
                    </form>
                    <a href="signup.php"> Click here to Sign up </a>

                </div>
                
                <div class="form-photo">
                    <img src="images/loading1.gif" alt="">
                </div>
        </div>
    </div> 
  
</body>
</html>