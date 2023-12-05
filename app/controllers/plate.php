<?php

include __DIR__ . '/../model/plate.php';


$error = array(
    'name' => '',
    'price' => '',
    'image' => '',
    'role' => '',
    'selectMenu' => ''
);

if (!function_exists('all')) {
function all()
{
    global $conn;
    $stmt = $conn->prepare(allPlate());
    $stmt->execute();
    $result = $stmt->get_result();
    $numRows = $result->num_rows;
    if ($numRows > 0) {
        $searchResults = $result->fetch_all(MYSQLI_ASSOC);
        return $searchResults;
        // var_dump($searchResults);
    } 
}




function menu()
{
    global $conn;
    $stmt = $conn->prepare(getMenu());
    $stmt->execute();

    $result = $stmt->get_result();
    $numRows = $result->num_rows;
    if ($numRows > 0) {
        $searchResults = $result->fetch_all(MYSQLI_ASSOC);
        return $searchResults;
        // var_dump($searchResults);
    } 
}


function add($name , $price,$image,$menu)
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

    if (empty($price)) {
        $error['price'] = "price is required";
    } elseif (!filter_var($price, FILTER_VALIDATE_INT)) {
        $error['price'] = "price mast be integer";
    } else {
        $error['price'] = "";
    }

    if (empty($menu)) {
        $error['selectMenu'] = "menu is required";
    }

    if (isset($image)) {
 
        $filename = $image["name"];
        $tempname = $image["tmp_name"];
        $folder = "./../../assets/images/" . $filename;

        move_uploaded_file($tempname, $folder);
        $error['image']="";

    }else{
        $error['image']="image is required";
    }

    if (empty($error['name']) && empty($error['selectMenu']) && empty($error['price']) && empty($error['image'])) {

        $stmt = $conn->prepare(createPlate());
        $stmt->bind_param("sisi", $name, $menu,$filename,$price);
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

    $stmt = $conn->prepare(editPlate());
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $stmt->close();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        return $user;
        // var_dump($user);
    } else {
        return null;
    }
}

function update($name , $menu,$image,$price,$id)
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

    if (empty($price)) {
        $error['price'] = "price is required";
    } elseif (!filter_var($price, FILTER_VALIDATE_INT)) {
        $error['price'] = "price mast be integer";
    } else {
        $error['price'] = "";
    }

    if (empty($menu)) {
        $error['selectMenu'] = "menu is required";
    }

    if (isset($image)) {
 
        $filename = $image["name"];
        $tempname = $image["tmp_name"];
        $folder = "./../../assets/images/" . $filename;

        move_uploaded_file($tempname, $folder);
        $error['image']="";

    }else{
        $error['image']="image is required";
    }

    if (empty($error['name']) && empty($error['selectMenu']) && empty($error['price']) && empty($error['image'])) {

        $stmt = $conn->prepare(updateplate());
        $stmt->bind_param("sisii", $name, $menu,$filename,$price,$id);
        $stmt->execute();
        $stmt->close();
        $check = "success";
        // header('location:index.php');   
        // echo '<script>window.location.href = "index.php";</script>';
    } else {
        $check = "error";
    }
}


function delete($id)
{
    global $conn;
    $stmt = $conn->prepare(deletePlate());
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