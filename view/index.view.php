<?php session_start();?> 
<?php require ("parts/header.php"); ?>
<h1>------------ this is body --------------</h1>

<h1 class="underline text-green-500">Hello <?php if (isset($_SESSION['name'])){
    echo $_SESSION['name'];
    echo '<a class=" text-red-500" href="../controller/sessiondestroy.php">logout</a>';
}else{
    echo "guest";
} ?></h1>




<?php require ("parts/footer.php"); ?>