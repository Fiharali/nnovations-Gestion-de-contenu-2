<?php

include __DIR__ . '/../model/menu.php';


$error = array(
    'name' => '',
    'email' => '',
    'password' => '',
    'role' => '',
    'selectChef' => ''
);

if (!function_exists('all')) {
function all()
{
    global $conn;
    $stmt = $conn->prepare(allMenu());
    $stmt->execute();
    $result = $stmt->get_result();
    $numRows = $result->num_rows;
    if ($numRows > 0) {
        $searchResults = $result->fetch_all(MYSQLI_ASSOC);
        return $searchResults;
        // var_dump($searchResults);
    } 
}




function chefs()
{
    global $conn;
    $stmt = $conn->prepare(getChefs());
    $stmt->execute();

    $result = $stmt->get_result();
    $numRows = $result->num_rows;
    if ($numRows > 0) {
        $searchResults = $result->fetch_all(MYSQLI_ASSOC);
        return $searchResults;
        // var_dump($searchResults);
    } 
}


function add($name , $chef)
{
    global $conn;
    global $error;
    global $check;

    if (empty($name)) {
        $error['name'] = "name is required";
    } elseif (strlen($name) < 2) {
        $error['name'] = "name mast be >= 3";
    } else {
        $error['name'] = "";
    }

    if (empty($chef)) {
        $error['selectChef'] = "chef is required";
    }

    if (empty($error['name']) && empty($error['selectChef'])) {

        $stmt = $conn->prepare(createMenu());
        $stmt->bind_param("si", $name, $chef);
        $stmt->execute();
        $stmt->close();
        $check = "success";
    } else {
        $check = "error";
    }
}

function edit($id)
{
    global $conn;

    $stmt = $conn->prepare(editMenu());
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $stmt->close();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        return $user;
    } else {
        return null;
    }
}

function update($name, $chef,$id)
{
    global $conn;
    global $error;
    global $check;

   

    if (empty($name)) {
        $error['name'] = "name is required";
    } elseif (strlen($name) < 2) {
        $error['name'] = "name mast be >= 3";
    } else {
        $error['name'] = "";
    }

  


    if (empty($chef)) {
        $error['selectChef'] = "selectChef is required";
    }

    if (empty($error['name']) && empty($error['selectChef'])) {
        $stmt = $conn->prepare(updateMenu());
        $stmt->bind_param("sii", $name, $chef,$id);
        $stmt->execute();
        $stmt->close();
        $check = "success";

        // header('location:index.php');
        echo '<script>window.location.href = "index.php";</script>';
        exit();
    } else {
        $check = "error";
    }
}


function delete($id)
{
    global $conn;
    $stmt = $conn->prepare(deleteMenu());
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header('location:index.php');
}


function search($word)
{
    global $conn;
    $stmt = $conn->prepare(searchMenu());
    $searchTerm = "%" . $word . "%";
    $stmt->bind_param("sss", $searchTerm,$searchTerm,$searchTerm);
    $stmt->execute();
    

    
    $result = $stmt->get_result();
    $numRows = $result->num_rows;
    if ($numRows > 0) {
        $searchResults = $result->fetch_all(MYSQLI_ASSOC);
        return $searchResults;
    } 


  

    // header('location:index.php');
}
}