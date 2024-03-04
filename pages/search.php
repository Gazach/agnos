<?php
session_start();
require '../function/conn.php';

//random data Generate

$query = "SELECT * FROM user_data";

if(isset($_SESSION['ID']) && isset($_SESSION['displayname'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/search.css">
    <link rel="shortcut icon" href="../asset/Agnos.png">
    <title>Search</title>
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
       <label for="">Search</label>
    </nav>

    <div class="MainSearch">
        <div class="bar">
        <form action="" method="post">

        <input type="text" name="keyword" autofocus placeholder="find user" size="86" class="bar" id="keyword">

        </form>
        </div>
    <?php
        if ($result = mysqli_query($conn, $query)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row; 
            }
            foreach($rows as $row){
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
        }
        ?>
    </div>

    <script src="../function/js/jquery-3.7.1.min.js"></script>
    <script src="../function/js/search.js"></script>
</body>
</html>
<?php
 } else {
    header("Location: ../login.php?error=You Should Login First");
    exit();
} ?>