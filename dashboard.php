<?php
session_start();
$pageTitle = "Dashboard";

if (isset($_SESSION["user"])) {
    
    include 'init.php';
    
   ?>  <br><?php
    echo "<h3 class='text-center'> welcome " . $_SESSION["user"]  . "</h3>";
}else {
        header("location: login.php");
        exit();   
}
