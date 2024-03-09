<?php
session_start();
require '../function/conn.php';
$accID = $_GET['ID'];
$SQLs = "SELECT * FROM user_data WHERE ID='$accID'";
$result = mysqli_query($conn, $SQLs);
$row = mysqli_fetch_assoc($result);
if(isset($_SESSION['ID']) && isset($_SESSION['displayname'])){
if ($_GET['ID']) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="../asset/Agnos.png">
    <link rel="stylesheet" href="../css/Profile.css">
    <title>Profile</title>
</head>
<body>
    <nav>
        <?php 
        if ($_GET['pages'] == "Search") { ?>
            <a href="search.php" class="back">
            <i class='bx bx-left-arrow-alt bx-lg'></i>
            <div class="bottom">
            <p>Back</p>
            <i class="ibut"></i>
        </div>
            </a>
            <?php
        } else if ($_GET['pages'] == "home"){ ?>
            <a href="home.php" class="back">
            <i class='bx bx-left-arrow-alt bx-lg'></i>
            <div class="bottom">
            <p>Back</p>
            <i class="ibut"></i>
        </div>
            </a>
            <?php
        }
        ?>


        <label><?= $row['Username'];?> Profile</label>
    </nav>
    
    <div class="Personal">
        <div class="banner">
            <div class="left"></div>
            <img src="../asset/images/defaultbanner.jpg" alt="" srcset="" class="banners">
            <div class="right"></div>
        </div>
        <div class="profiles">
        <div class="profilesinfo">
        <img src="../asset/images/DefaultProfile.jpg" alt="" srcset="" class="pfp">
        <div class="name">
        <label class="displayName"><?= $row['displayName'];?></label>
        <label class="Username"><?= $row['Username'];?></label>
        </div>
        <?php
            if ($_GET['ID'] == $_SESSION['ID']) {
        ?>
            <a href="Settings?ID=<?php echo $_SESSION['ID'];?>" align="right" class="edit"><i class='bx bx-pencil'></i> Edit Profile</a>
        <?php
            }
        ?>
        </div>
        <div class="ProfileMenu">
            <a href="#">Post</a>
            <a href="#">About</a>
            <a href="#">Friend</a>
            <a href="#">Picture</a>
        </div>
        </div>
    </div>

    <div class="MainProfile">
            <h1>Content Still Empty</h1>
    </div>
</body>
</html>
<?php
} else {
    header("Location: Home.php");
}
} else {

    header("Location: ../login.php?error=You Should Login First");
    exit();
    }
?>