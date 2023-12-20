<?php
echo $_POST["email"];
echo $_POST["password"];
if (isset($_POST['pwchanged']) ){
    if ($_POST["password"] == $_POST["repassword"]){
        // $saveToken = "UPDATE users SET token ="."'".$token."'"." where email="."'".$email."'".";";
        $tokenExecute = mysqli_query($conn , $saveToken);
    }

}else{
    require ("./controller/login.php");
}