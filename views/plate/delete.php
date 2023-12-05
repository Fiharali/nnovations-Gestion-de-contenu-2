<?php


include '../../app/controllers/plate.php';


if (isset($_POST['id'])) {
    $getId =  $_POST['id'];
    delete($getId); 
    

} else {
    header('location:chefs.php');
}











?>