<?php

include __DIR__.'/../../database/connection.php';


if (!function_exists('all')) {



    
function allPlate()
{   
    $sql = "SELECT plate.*,menu.name as 'menu' FROM plate inner join menu on menu.id = plate.menu_id";
    return $sql;
}

function getMenu()
{   
    $sql = "SELECT * from menu";
    return $sql;
}

function createPlate()
{   
    $sql = "insert into plate values (null,?,?,?,?)";
    return $sql;
}


function editPlate()
{   
    $sql = "select * from plate where id = ?";
    return $sql;
}


function updateplate()
{   
    $sql = "UPDATE `plate` SET `name`=?,`menu_id`=? `price`=?,`image`=?, WHERE id = ?";
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