<?php
session_start();

if(isset($_SESSION["user_id"]))
{
  $mysqli = require __DIR__ . "/database.php";
  $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
  $result = $mysqli-> query($sql);
  $user = $result-> fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title> Home Page</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/home.css">
</head>
<body>
  <h1> Home Page </h1>
  <p><a href="logout.php">LogOut</a></p>

</body>
</html>