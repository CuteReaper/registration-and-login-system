<?php
require ("./db.php");

if(!isset($_POST["submit"])){
    echo "error";
}else{
    dd($_POST["username"]);
    dd($_POST["fname"]);
    dd($_POST["lname"]);
    dd($_POST["email"]);
    dd($_POST["password"]);
    dd($_POST["repassword"]);
}