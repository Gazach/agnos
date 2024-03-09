<?php
session_start();
require '../function/conn.php';

$uSettings = $_GET["ID"];
$SQLs = "SELECT * FROM user_data WHERE ID='$uSettings'";
$result = mysqli_query($conn, $SQLs);
$row = mysqli_fetch_assoc($result);
if(isset($_SESSION['ID']) && isset($_SESSION['displayname'])){
if ($_GET["ID"] == $_SESSION['ID']) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>User Setting</title>
</head>
<body>
<nav>
<nav>
        <a href="Profile.php?ID=<?php echo $_SESSION['ID'];?>&pages=home" class="back">
        <i class='bx bx-left-arrow-alt bx-lg'></i>
        <div class="bottom">
        <p>Back</p>
        <i class="ibut"></i>
    </div>
        </a>
       <label for="">User Setting</label>
    </nav>
</nav>
<div class="Main">
<div class="UserEdit">
<?= $row["Username"];?>
</div>
<div class="changePass">
    Change Password?
</div>
</div>



</body>
</html>
<?php
} else {
    header("Location: Profile.php?ID=".$_SESSION['ID']."&pages=home");
}
} else {
    header("Location: ../login.php?error=You Should Login First");
    exit();
}
?>