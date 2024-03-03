<?php
session_start();
include "function/conn.php";
$cek = "KONTOL";
if(isset($_POST['uname']) && isset($_POST['password'])) {
    $users = $_POST['uname'];
    $pass = $_POST['password'];
    if(empty($users)) {
        header("Location: login.php?error=Username is required");
        exit();
    } else if(empty($pass)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {

        $sql = "SELECT * FROM user_data WHERE Email='$users' AND Password='$pass'";

        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            if ($row['Email'] === $users && $row['Password'] === $pass){
                $_SESSION['displayname'] = $row['displayName'];
                $_SESSION['ID'] = $row['ID'];
                header("Location: pages/home.php");
                exit(); 

            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="asset/Agnos.png">
    <link rel="stylesheet" href="css/Login.css">
    <title>Log in</title>
</head>
<body>
    <form action="" method="POST">
    <img src="asset/Agnos.png" alt="">
    <h1>Log in to Agnos</h1>
    <?php if(isset($_GET['error'])) { ?>
            <p class="ErrorAlert"><?php echo $_GET['error']?></p>
    <?php } ?>
    <?php if(isset($_GET['success'])) { ?>
            <p class="SuccessAlert"><?php echo $_GET['success']?></p>
    <?php } ?>
    <label for="">Email:</label>
    <input type="email" name="uname">
    <label for="">Password</label>
    <input type="password" name="password">
    <button type="submit" name="login">Log in</button>
    <a href="signin.php">Create account here</a>
    </form>
</body>
</html>