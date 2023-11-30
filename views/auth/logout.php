<?php
session_start();
$_SESSION[ 'name' ] = '';
unset($_SESSION['name']);
session_destroy();
header('Location:/youcode/dash/views/auth/login.php');
?>