<?php

include __DIR__.'/../../database/connection.php';






    
function allCommendUser()
{   
    $sql = "SELECT commend.*,plate.*, users.name as 'username',users.id as 'userId' FROM commend inner join users on users.id = commend.client_id INNER join plate on plate.id = commend.plate_id where users.id = ?";
    return $sql;
}



function createUserCommend()
{   
    $sql = "INSERT INTO commend VALUES (null,?,?,?,?)";
    return $sql;
}


// function editPlate()
// {   
//     $sql = "select * from plate where id = ?";
//     return $sql;
// }


// function updateplate()
// {   
//     $sql = "UPDATE `plate` SET `name`=?,`menu_id`=?,`image`=?,`price`=? WHERE id=?";
//     return $sql;
// }


// function deletePlate()
// {   
//     $sql = "delete from plate WHERE id = ?";
//     return $sql;
// }

// function searchMenu()
// {   
//     $sql = "SELECT menu.*,users.name as 'chef' FROM menu inner join users on users.id = menu.chef_id WHERE menu.id LIKE ? OR menu.name LIKE ? OR users.name  LIKE ?";
//     return $sql;
// }