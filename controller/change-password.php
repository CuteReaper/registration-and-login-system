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
}elseif (isset($_POST['pwchanged']) ){
    $email = $_POST["email"];
    require ("../model/db.php");
    if ($_POST["password"] == $_POST["repassword"]){
        $password = "'".password_hash($_POST["password"] , PASSWORD_DEFAULT)."'";

        $updatepwd = "UPDATE users SET password =".$password." where email=".$email.";";
        $pwdExecute = mysqli_query($conn , $updatepwd);

        if (!mysqli_num_rows($pwdExecute) >0){
            echo "failed";
        }else{
            echo "pwd changed";
        }
    }

}else{
    header( "Refresh:1; url=../controller/login.php", true, 303);
}