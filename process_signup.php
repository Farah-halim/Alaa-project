<?php
mysqli_report(MYSQLI_REPORT_OFF);


if(strlen($_POST["password"]) < 8)
{
  die("Password must be at least 8 characters long. Please go back to continue.");
}


if(!preg_match("/[0-9]/i", $_POST["password"]))
{
  die("Password must contain a number. Please go back to continue.");
}

if($_POST["password"] !== $_POST["confirm_password"])
{
  die("Password and confirm password must match. Please go back to continue.");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$mysqli = require __DIR__ . "/database.php";
$sql = "INSERT INTO user (username, email, password_hash) VALUES (?, ?, ?)";
$stmt = $mysqli->stmt_init();

if(!$stmt->prepare($sql))
{
  die("SQL Error: " . $mysqli->error);
}

$stmt->bind_param("sss", $_POST["username"], $_POST["email"], $password_hash);

if($stmt->execute())
{
  header("Location: signup_success.php");
  exit;
}

?>