<?php

include __DIR__.'/../../../database/connection.php';

function loginUser()
{   
    $sql = "select users.* , role.name as 'role' from users inner join role on role.id=users.role_id where email = ?";
    return $sql;
}