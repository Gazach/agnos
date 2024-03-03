<?php
include 'conn.php';

function signinfunc($data) {
    global $conn;
    $username = ($data['uname']);
    $username2 = str_replace(' ','',$username);
    $displayname = $username;
    $lowuser= strtolower($username2);
    $newuser = "@".$lowuser;
    $email = (strtolower($data['email']));
    $password = (strtolower($data['password']));
    $repassword = (strtolower($data['repassword']));

    $check = "SELECT Email FROM user_data WHERE Email='$email'";
    $result = mysqli_query($conn, $check);
    if(mysqli_fetch_assoc($result)){
        header("Location: ../signin.php?error=Email has already used!");
        return false;
    }

    if($password !== $repassword){
        header("Location: ../signin.php?error=Password doesn't match!");
        return false;
    }

    $sql = "INSERT INTO user_data(Username, Email, Password, displayName)  VALUES('$newuser','$email','$password','$displayname')";
    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}
?>