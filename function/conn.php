<?php
$sname = "localhost";
$unmae = "root";
$password = "";

$db_name = "agnos_db";

$conn = mysqli_connect($sname,$unmae,$password,$db_name);

if (!$conn) {
    echo "Connection failed!";
} else {
    usleep(10);
    echo "<script>console.log('$db_name is Connected'); </script>";
}