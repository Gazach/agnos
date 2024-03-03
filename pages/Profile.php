<?php
session_start();
require '../function/conn.php';
$accID = $_GET['ID'];
$SQLs = "SELECT * FROM user_data WHERE ID='$accID'";
$result = mysqli_query($conn, $SQLs);
$row = mysqli_fetch_assoc($result);
if ($_GET['ID'] == $_SESSION['ID']) {
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
        <a href="home.php" class="back">
        <i class='bx bx-left-arrow-alt bx-lg'></i>
        <div class="bottom">
        <p>Back</p>
        <i class="ibut"></i>
    </div>
        </a>
        <label>Profile</label>
    </nav>
    
    <div class="Personal">
        <h1>Personal Info</h1>
    <img src="../asset/images/DefaultProfile.jpg" alt="" srcset="">
    <h3>Display Name : <?= $row['displayName'];?></h3>
    <h3>Username : <?= $row['Username'];?></h3>
    <h3>Email : <?= $row['Email'];?></h3>
    <h3>Password : <?= $row['Password'];?></h3>
    </div>
</body>
</html>
<?php
} else {
    header("Location: Home.php");
}
?>