<?php
session_start();
$pageTitle = "Dashboard";

include 'init.php';

echo "<h3 class='text-center'> welcome " . $_SESSION["user"]  . "</h3>";

// Footer is already included in init.php, so no need to include it again
