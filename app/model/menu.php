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


function editMenu()
{   
    $sql = "select * from menu where id = ?";
    return $sql;
}


function updateMenu()
{   
    $sql = "UPDATE `menu` SET `name`=?,`chef_id`=? WHERE id = ?";
    return $sql;
}


function deleteMenu()
{   
    $sql = "delete from menu WHERE id = ?";
    return $sql;
}

function searchMenu()
{   
    $sql = "SELECT menu.*,users.name as 'chef' FROM menu inner join users on users.id = menu.chef_id WHERE menu.id LIKE ? OR menu.name LIKE ? OR users.name  LIKE ?";
    return $sql;
}


}