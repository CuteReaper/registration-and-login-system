<?php

if (isset($_POST['pwchanged']) ){
    $email = $_POST["email"];
    require ("../model/db.php");
    if ($_POST["password"] == $_POST["repassword"]){
        
        // add current pwd to db
        $pwdbackup = "SELECT user_id , password FROM users where email=".$email.";";
        $pwd = mysqli_query($conn , $pwdbackup);
        $row = $pwd->fetch_assoc();
        $pass = "'".($row["password"])."'";
        $user =($row["user_id"]);
        $time = time();

        $sql = "INSERT INTO `pass_history` (`user_id`, `pass`, `time`) VALUES ( $user,$pass, $time);";
        if ($conn->query($sql) === TRUE) {
            echo "<h1>New record created successfully ( pass_history )</h1>";
        }else{
            echo "<h1>failed</h1>";
        }

        // check old pwd and insert new pwd

        $checkoldpwd = "SELECT pass FROM pass_history where user_id=".$user.";";
        $oldpwd = mysqli_query($conn , $checkoldpwd);
        $oldpwdrow = $oldpwd->fetch_all();
        // print_r($oldpwdrow);
        $oldPasswords=[];
        foreach (array_keys($oldpwdrow) as $pas) {
            array_push($oldPasswords,$oldpwdrow[$pas]["0"]);

            // if (password_verify(($_POST["password"]),($oldpwdrow[$pas]["0"]))){
            //     echo "pwd matched  ".($_POST["password"])."<br>";

            // }else{
            //     echo "pwd not matched <br>";
            // }


        }

        $newPassword = ($_POST["password"]);
        // -------------------------------------

        function isPasswordMatch($newPassword, $oldPasswords) {
            foreach ($oldPasswords as $hashedPassword) {
                if (password_verify($newPassword, $hashedPassword)) {
                    return true;
                }
            }
            return false;
        }

        if (isPasswordMatch($newPassword, $oldPasswords)) {
            echo "Old password entered";
        } else {
            $password = "'".password_hash($_POST["password"] , PASSWORD_DEFAULT)."'";
            // insert new pwd
            $updatepwd = "UPDATE users SET password =".$password." where email=".$email.";";
            if (mysqli_query($conn , $updatepwd)){
                echo "pwd update";
            }else{
                echo "failed";
            }
        }

        // ---------------------------------------------
            
    

        // if (in_array(897, $oldPasswords) and !password_verify(123,$oldpwdrow[$pas]["0"])) {
        //     echo "Old password entered";
        // } else {
        //     echo "added to database";
        // }

        // foreach (array_keys($oldpwdrow) as $pas) {
        //     echo $oldpwdrow[$pas]["0"].'<br>';

        //     // if(!password_verify(123,$oldpwdrow[$pas]["0"])){

        //     if (123==$oldpwdrow[$pas]["0"]){
        //         $password = "'".password_hash($_POST["password"] , PASSWORD_DEFAULT)."'";// insert new pwd
        //         echo "old pwd enterred";
        //         // $updatepwd = "UPDATE users SET password =".$password." where email=".$email.";";
        //         // $pwdExecute = mysqli_query($conn , $updatepwd);
        //         break
        //     }

            


        // }


        
        

        
        
    // }else{
    //     echo "pass not match";
    // }
    }

}else{
    header( "Refresh:1; url=../controller/login.php", true, 303);
}