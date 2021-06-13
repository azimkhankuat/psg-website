<?php
session_start();
setcookie(session_name(), '', 100);
unset($_SESSION['user']);
unset($_COOKIE['username']);;
session_unset();
session_destroy();
$_SESSION = array();
header("Location: login.php");