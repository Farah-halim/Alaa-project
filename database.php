<?php
$host = "localhost";
$dbname = "login_db";
$username = "root";
$password = "";

$con = new mysqli($host, $username, $password, $dbname);

if(!$con) {
  die("connection failed:".mysqli_connect_error());
}
?>