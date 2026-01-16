<?php
session_start();
$pageTitle = "Dashboard";

if (isset($_SESSION["user"])) {
    
    echo "<h3 class='text-center'> welcome " . $_SESSION["user"]  . "</h3>";
    include 'init.php';
}else {
        header("location: login.php");
        exit();   
}
