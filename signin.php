<?php
require "function/signinfun.php";
if (isset($_POST['signin'])) {
    if (signinfunc($_POST)) {
        header("Location: login.php?success=Account has been created!");
    } else {
        echo "<script>console.log('Failed!'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="asset/Agnos.png">
    <link rel="stylesheet" href="css/signin.css">
    <title>Sign in</title>
</head>
<body>
    <form action="" method="POST">
    <img src="asset/Agnos.png" alt="">
    <h1>Sign in to Agnos</h1>
    <?php if(isset($_GET['error'])) { ?>
            <p class="ErrorAlert"><?php echo $_GET['error']?></p>
    <?php } ?>
    <label for="">Username:</label>
    <input type="text" name="uname">

    <label for="">Email:</label>
    <input type="email" name="email">

    <label for="">Password</label>
    <input type="password" name="password">

    <label for="">Confirm your Password</label>
    <input type="password" name="repassword">

    <button type="submit" name="signin">Sign in</button>
    <a href="login.php">Already have account?</a>
    </form>
</body>
</html>