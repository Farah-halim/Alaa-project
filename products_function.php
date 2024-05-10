<?php
$host = "localhost";
$name = "root";
$image = "";
$dbname = "product_db";

$conn = new mysqli($host, $name, $image, $dbname);

if(!$conn)
{
  die("Connection Failed");
}
?>
