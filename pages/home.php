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
        <p>Search User</p>
        <i></i>
    </div>
        </a>
    </div>
    <div>
    <button type="submit" id="logoutbutton" class="logout">Log Out</button>
    <b for="" class="displayname"><?php echo $_SESSION['displayname'];?></b>
        <a href="Profile.php?ID=<?php echo $_SESSION['ID'];?>&pages=home" class="profiles">
    <img src="../asset/images/DefaultProfile.jpg" alt="" srcset="">
    <div class="bottom">
        <p>Account</p>
        <i></i>
    </div>
    </a>
    </div>
    </nav>

    <div class="Main">
        <div class="addpost">
            <span role="textbox" class="textarea" maxlength="10" id="clicktoup">&nbsp;&nbsp;&nbsp;What's on your mind, <?= $_SESSION['displayname']?>?</span>
            <button type="button" class="addbutton2" id="clicktoup">Add Image
                    <!-- image button svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
  <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
  <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1z"/>
</svg>
                </button>
        </div>
        <div class="poppost" id="poppost">
            <div class="content">
                <div class="posttitle">
                    <b>Create Post</b>
                    <button id="close" class="closepost">X</button>
                </div>
                <hr>
                <div class="postProfile">
                    <img src="../asset/images/DefaultProfile.jpg" alt="" srcset="">
                    <p><?= $_SESSION['displayname']?></p>
                </div>
                <textarea name="" id="postmessagearea" class="areapost" maxlength="10000" placeholder="What's on your mind, <?= $_SESSION['displayname']?>?"></textarea>
                <button type="button" class="add_button">Add Image
                    <!-- image button svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
  <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
  <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1z"/>
</svg>
                </button>
                <!-- Button to upload post -->
                <button type="submit" class="uploadPost" id="uploadposting">Post</button>
            </div>
        </div>
    </div>
</body>
<script src="../function/js/jsfunction.js"></script>
<script src="../function/js/readpost.js"></script>

<script>
    //open upload gui
    let open = document.getElementById("clicktoup");
    open.addEventListener("click", function(){
        poppost.style.display = "block"
    });

    //close upload gui
    let closegui =  document.getElementById("close");
    let poppost =   document.getElementById("poppost");

    closegui.addEventListener("click", function() {
        poppost.style.display = "none"
    });

</script>
</html>
<?php
 } else {

    header("Location: ../login.php?error=You Should Login First");
    exit();
    } 
    ?>

