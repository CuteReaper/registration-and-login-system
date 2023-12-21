<?php
echo "hi <br>";
if (isset($_GET["token"])){
    $token ="'".$_GET["token"]."'";
    $email= "'".$_GET["email"]."'";

    require ("../model/db.php");
    $sql = "SELECT * FROM `users` WHERE token =$token and email=$email;";
    $result = mysqli_query($conn , $sql);

    if (!mysqli_num_rows($result) > 0){
        echo "invalid token";
    }else{
        require ("../view/change-password.view.php");
    }
}else{
    header( "Refresh:1; url=../controller/login.php", true, 303);
}