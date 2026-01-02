<?php

ini_set('display_error', 'On');
error_reporting(E_ALL);


include 'admin/connect.php';
$session_user = '';
if (isset($_SESSION["user"])) {
    $session_user = $_SESSION["user"];
}

//Routes
$tpl = 'includes/templates/';
$lang = 'includes/languages/';
$func = 'includes/functions/';

include $func . 'functions.php';
include $lang . 'english.php';
include $tpl . 'header.php';

if (!isset($noNavbar)) {
    include $tpl . 'navbar.php';
}
include $tpl . 'footer.php';
