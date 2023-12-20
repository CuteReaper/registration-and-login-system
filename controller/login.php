<?php

if(!isset($_POST["submit"])){
    require ("./view/login.view.php");
    
}else{
    
    require ("../model/db.php");

    $username = ("'".htmlspecialchars($_POST["username"])."'");

    $password = ("'".$_POST["password"]."'");

    // echo $username." ".$password;
    $sql = "SELECT * FROM `users` WHERE email = $username or username = $username and password=$password;";
    echo $sql;
    $result = mysqli_query($conn , $sql);
    $row = $result->fetch_assoc();
    require ("../helper.php");
    print_r ($result);
    if (!mysqli_num_rows($result) > 0){

        // $sql = "INSERT INTO `users` (`username`, `first_name`, `last_name`, `email`, `password`) VALUES ($username, $fname, $lname, $email, $password);";
        // if ($conn->query($sql) === TRUE) {
            echo "<h1>username or pwd doesnt match</h1>";
            // header("Location: /login");
            // header( "Refresh:1; url=/login", true, 303);
            // echo "sent-";
        //   } else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
          //}
    }else{
        echo "<h1>success</h1>";
        header( "Refresh:1; url=/", true, 303);
        session_start();
        $_SESSION['name'] = $row["first_name"];

        
    }
    
}
