<?php
session_start();
$pageTitle = "Login";

if (isset($_SESSION["user"])) {
    header("location: dashboard.php");
}
include 'init.php';

echo "<h3 class='text-center'> welcome" . $_SESSION["user"]  . "</h3>";
