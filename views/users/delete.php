<?php


include '../../app/controllers/user.php';


if (isset($_POST['id'])) {
    $getId =  $_POST['id'];
   delete($getId); 
// echo $getId; 
} else {
    header('location:chefs.php');
}











?>