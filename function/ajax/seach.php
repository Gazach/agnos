<?php
    require '../conn.php';
    $keyword = $_GET['keyword'];
    $query = "SELECT * FROM data_user
    WHERE Username = '%$keyword%' OR
    displayName = '%$keyword%'
    ";
    $user = query($query);
?>
    <a href="Profile.php?ID=<?php echo $row['ID'];?>&pages=Search" class="LINK">
    <div class="account">
    <img src="../asset/images/DefaultProfile.jpg" alt="" srcset="" class="pfp">
    <p>
    <b for=""><?php echo $row['displayName'] ?></b> <br>
    <label for=""><?php echo $row['Username'] ?></label>
    </p>
    </div>
    </a>