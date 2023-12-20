<?php




if (isset($_POST["change"])){
    $email = $_POST["email"];
    echo "access the the if  <br>";
    require ("../model/db.php");
    $checkEmail = 'SELECT * FROM users WHERE email='.'"'.$email.'"'.';';
    $result = mysqli_query($conn , $checkEmail);
    $row = $result->fetch_assoc();
    var_dump($row) ;
    echo "query executed  <br>";

    $token = md5(rand());

    $saveToken = "UPDATE users SET token ="."'".$token."'"." where email="."'".$email."'".";";
    $tokenExecute = mysqli_query($conn , $saveToken);
    

    if (!mysqli_num_rows($result) >0){
        // email ekak nattan
        $_SESSION["status"] = "Email Not Found";
        $_SESSION["isvalid"] = false;

        // email ekak thibboth
    }else{
        // emai ekak yawanna oni
        echo "email found  <br>";

        require ("./phpmailer.php");

        echo 'executing function  <br>';
        echo "$email,<br>".$row['username'].",<br>$token <br>";
        forgot_mail_sender2($email,$row["username"],$token);
    }

}else{
    require ("./forgot.php");
}