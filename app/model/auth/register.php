<?php

include __DIR__.'/../../../database/connection.php';


function registerUsers()
{   
    $sql = "insert into users values (null,?,?,?,3)";
    return $sql;
}

function checkUser()
{   
    $sql = "select * from users where email = ?";
    return $sql;
}