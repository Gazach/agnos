<?php 
    session_start();
    require '../function/conn.php';
    if(isset($_SESSION['ID']) && isset($_SESSION['displayname'])){
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../asset/Agnos.png">
    <link rel="stylesheet" href="../css/home.css">
    <title>Home</title>
</head>
<body>
    <nav>
        <a href="#" class="logo">
        <img src="../asset/Agnos.png" alt="" srcset="">
        </a>
        <a href="search.php" class="search">
        <img src="../asset/images/search.png" alt="" srcset="">
        <div class="bottom">
        <p>Search</p>
        <i></i>
    </div>
        </a>
    </div>
    <div>
    <button type="submit" id="logoutbutton" class="logout">Log Out</button>
    <b for="" class="displayname"><?php echo $_SESSION['displayname'];?></b>
        <a href="Profile.php?ID=<?php echo $_SESSION['ID'];?>" class="profiles">
    <img src="../asset/images/DefaultProfile.jpg" alt="" srcset="">
    <div class="bottom">
        <p>Account</p>
        <i></i>
    </div>
    </a>
    </div>
    </nav>

    <div class="Main">
        Content Empty!
    </div>
</body>
<script src="../function/js/jsfunction.js"></script>
</html>
<?php
 } else {

    header("Location: ../login.php?error=You Should Login First");
    exit();
    } ?>

