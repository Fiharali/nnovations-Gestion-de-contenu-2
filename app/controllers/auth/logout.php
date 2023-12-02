<?php
session_start();
$_SESSION[ 'name' ] = '';
$_SESSION[ 'id' ] = '';
$_SESSION[ 'role' ] = '';
unset($_SESSION['name']);
unset($_SESSION['id']);
unset($_SESSION['role']);
session_destroy();
header('Location:/youcode/dash/views/auth/login.php');
?>