
<?php 

$conn = new mysqli("localhost","root1","","management_system");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo "connected";
}