
<?php

echo "4 register"; 
?>

<?php

if(!isset($_POST["submit"])){
    require("view/register.view.php");
    
}else{
    
    require ("../model/db.php");

    $username = ("'".$_POST["username"]."'");
    $fname = ("'".$_POST["fname"]."'");
    $lname = ("'".$_POST["lname"]."'");
    $email = ("'".$_POST["email"]."'");
    $password = ("'".$_POST["password"]."'");
    ($_POST["repassword"]);

    
    if ($_POST["password"] === $_POST["repassword"]){
        $sql = "INSERT INTO `users` (`username`, `first_name`, `last_name`, `email`, `password`) VALUES ($username, $fname, $lname, $email, $password);";
        if ($conn->query($sql) === TRUE) {
            echo "<h1>New record created successfully</h1>";
            // header("Location: /login");
            header( "Refresh:1; url=/login", true, 303);
            // echo "sent-";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
    }else{
        echo "<h1>check credentials</h1>";
        header( "Refresh:1; url=/register", true, 303);
        
    }
    
}


