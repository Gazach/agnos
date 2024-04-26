<?php
session_start();
require '../function/conn.php';

$uSettings = $_GET["ID"];
$SQLs = "SELECT * FROM user_data WHERE ID='$uSettings'";
$result = mysqli_query($conn, $SQLs);
$row = mysqli_fetch_assoc($result);
if (isset($_SESSION['ID']) && isset($_SESSION['displayname'])) {
    if ($_GET["ID"] == $_SESSION['ID']) {

        $mypassvisible = $row['Password'];
        $mypassnotvisible = str_repeat("*", strlen($mypassvisible));

        //Update user function

        if (isset($_POST["savefun"])) {
            $defaultdata = "password tidak berubah";
            $displayN = !empty($_POST["display"]) ? str_replace(' ', '', $_POST["display"]) : $row['displayName'];
            
            $Emails = !empty($_POST["email"]) ? str_replace(' ', '', $_POST["email"]) : $row['Email'];
            
            $pass = !empty($_POST["pass"]) ? str_replace(' ', '', $_POST["pass"]) : $row['Password'];

            echo "<script>console.log('$pass,$Emails,$displayN')</script>";

            $updateSQL = "UPDATE user_data SET Email = '$Emails', Password = '$pass', displayName = '$displayN' WHERE ID = $uSettings";

            mysqli_query($conn, $updateSQL);
            header("Refresh:0");
            
        }

        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            <link rel="shortcut icon" href="../asset/Agnos.png">
            <link rel="stylesheet" href="../css/setting.css">
            <title>User Setting</title>
        </head>

        <body>
            <nav>
                <a href="Profile.php?ID=<?php echo $_SESSION['ID']; ?>&pages=home" class="back">
                    <i class='bx bx-left-arrow-alt bx-lg'></i>
                    <div class="bottom">
                        <p>Back</p>
                        <i class="ibut"></i>
                    </div>
                </a>
                <label for="">Edit <?= $row["displayName"]; ?> Profile</label>
            </nav>
            <!-- Your Profile-->
            <div class="Main">
                <div class="Currentusers" id="Currentusers">
                    <div class="Profilepict">
                        <img src="../asset/images/DefaultProfile.jpg" alt="" srcset="" class="pfp">
                    </div>
                    <div class="userdata">
                        <label for="">Username : <?= $row['Username']; ?></label><br>
                        <br>
                        <label for="">Display Name : <?= $row['displayName']; ?></label><br>
                        <br>
                        <label for="">Email : <?= $row['Email']; ?></label><br>
                        <br>
                        <div class="arev" id="arev">
                            <!--Visible-->
                            <label for="">password : <?= $mypassnotvisible ?></label>
                            <button id="visible" name="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff"
                                    class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                    <path
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                </svg>
                            </button><br>
                        </div>
                        <!--Not Visible-->
                        <div class="notv" id="notv">
                            <label for="">password : <?= $mypassvisible ?></label>
                            <button id="notvisible" name="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff"
                                    class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                                    <path
                                        d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z" />
                                    <path
                                        d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z" />
                                </svg>
                            </button>
                        </div>
                        <br>
                        <br>

                    </div>

                    <div>

                    </div>

                </div>
                <div class="editmode" id="editbut">
                    <button class="edit" id="openmenu">
                        <label>Edit profile</label>
                    </button>
                </div>


                <!--Edit Menu-->
                <div id="editmenu" class="editmenu">
                    <div class="edituser">
                        <div class="iamgesprofile">
                            <img src="../asset/images/DefaultProfile.jpg" alt="" srcset="" class="pfp">
                        </div>
                        <form action="" method="post">
                        <div class="editable">
                                
                                <br>
                                <label for="" class="editlable">Username : <?= $row['Username']; ?> (Username can't be change)</label><br>
                                <br>
                                <label for="" class="editlable">Display Name : <input type="text" placeholder="<?= $row['displayName']; ?>"
                                        name="display"></label><br>
                                <br>
                                <label for="" class="editlable">Email : <input type="email" placeholder="<?= $row['Email']; ?>"
                                        name="email"></label><br>
                                <br>
                                <label for="" class="editlable">password : <input type="text" placeholder="<?= $mypassvisible ?>"
                                        name="pass"></label>
                            <h5>Note : Just empty the box if you doesn't want to change your current information</h5>
                        </div>
                        
                        <div class="saveorcancel">

                            <button class="save" name="savefun" type="submit">Save change</button>
                            <button class="cancel" id="cancels">Cancel</button>

                        </div>
                        </form>
                    </div>

                    <script>

                    </script>
                    <!-- show button -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                    <script>
                        let visiblebut = document.getElementById("visible");
                        let notvisiblebut = document.getElementById("notvisible");
                        let notdivvis = document.getElementById("notv");
                        let divis = document.getElementById("arev");

                        visiblebut.addEventListener('click', function () {
                            notdivvis.style.display = "block";
                            divis.style.display = "none";
                        });
                        notvisiblebut.addEventListener('click', function () {
                            notdivvis.style.display = "none";
                            divis.style.display = "block";
                        });
                    </script>
                    <!---Open edit menu-->
                    <script>
                        let editmen = document.getElementById("openmenu");
                        let editgui = document.getElementById("editmenu");
                        let curuser = document.getElementById("Currentusers");
                        let editbut = document.getElementById("editbut");
                        editmen.addEventListener('click', function () {
                            editgui.style.display = "block"
                            curuser.style.display = "none";
                            editbut.style.display = "none";
                        });

                        //close menu

                        let close = document.getElementById("cancels");
                        close.addEventListener('click', function () {
                            editgui.style.display = "none"
                            editbut.style.display = "block";
                            curuser.style.display = "flex";
                        });

                    </script>
        </body>

        </html>
        <?php
    } else {
        header("Location: Profile.php?ID=" . $_SESSION['ID'] . "&pages=home");
    }
} else {
    header("Location: ../login.php?error=You Should Login First");
    exit();
}
?>