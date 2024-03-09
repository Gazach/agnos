<?php
    session_start();
    require 'function/conn.php';
    if(isset($_SESSION['ID']) && isset($_SESSION['displayname'])){
        header("Location: pages/home.php");
    } else {
        header("Location: Welcome.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wait...</title>
</head>
<body>
    <h1>Wait...</h1>
</body>
</html>