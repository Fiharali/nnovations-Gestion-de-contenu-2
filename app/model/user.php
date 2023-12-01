<?php

include __DIR__.'/../../database/connection.php';

function allUsers()
{   
    $sql = "SELECT users.*,role.name as 'role' FROM users inner join role on role.id = users.role_id";
    return $sql;
}


function createUsers()
{   
    $sql = "insert into users values (null,?,?,?,?)";
    return $sql;
}


function editUser()
{   
    $sql = "select * from users where id = ?";
    return $sql;
}


function updateUser()
{   
    $sql = "UPDATE `users` SET `name`=?,`email`=?,`password`=?,`role_id`=? WHERE id = ?";
    return $sql;
}


function deleteUser()
{   
    $sql = "delete from users WHERE id = ?";
    return $sql;
}



function searchUser()
{   
    $sql = "SELECT users.*,role.name as 'role' FROM users inner join role on role.id = users.role_id WHERE users.id LIKE ? OR users.name LIKE ? OR users.email LIKE ?";
    return $sql;
}