<?php
require "../conn.php";
$keyword = $_GET['keyword'];
$sql = "SELECT * FROM user_data WHERE Username LIKE '%$keyword%' OR displayName LIKE '%$keyword%'";

$result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        
?>
    <div class="container">
    <a href="Profile.php?ID=<?php echo $row['ID'];?>&pages=Search" class="LINK">
    <div class="account">
    <img src="../asset/images/DefaultProfile.jpg" alt="" srcset="" class="pfp">
    <p>
    <b for=""><?php echo $row['displayName'] ?></b> <br>
    <label for=""><?php echo $row['Username'] ?></label>
    </p>
    </div>
    </a>
    </div>

<?php
}

    } else {
        echo "<h5 align='center'>User Not found</h5>";
    }

 ?>
