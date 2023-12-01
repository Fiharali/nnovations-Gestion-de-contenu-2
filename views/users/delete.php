<?php


include '../../app/controllers/user.php';


if (isset($_POST['id'])) {
    $getId =  $_POST['id'];
   delete($getId);  
} else {
    header('location:chefs.php');
}











?>