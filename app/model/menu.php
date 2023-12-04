<?php

include __DIR__.'/../../database/connection.php';


if (!function_exists('all')) {



    
function allMenu()
{   
    $sql = "SELECT menu.*,users.name as 'chef' FROM menu inner join users on users.id = menu.chef_id";
    return $sql;
}

function getChefs()
{   
    $sql = "SELECT users.name as 'nameChef',users.id as'id',role.name  FROM users inner join role on role.id = users.role_id where role.name='chef'";
    return $sql;
}

function createMenu()
{   
    $sql = "insert into menu values (null,?,?)";
    return $sql;
}


function editUser()
{   
    $sql = "select * from menu where id = ?";
    return $sql;
}


function updateUser()
{   
    $sql = "UPDATE `menu` SET `name`=?,`user_id`=? WHERE id = ?";
    return $sql;
}


function deleteUser()
{   
    $sql = "delete from menu WHERE id = ?";
    return $sql;
}


}