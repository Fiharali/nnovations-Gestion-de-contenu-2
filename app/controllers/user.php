<?php

include __DIR__ . '/../model/user.php';


$error = array(
    'name' => '',
    'email' => '',
    'password' => '',
    'role' => ''
);

function all()
{
    global $conn;
    $stmt = $conn->prepare(allUsers());
    $stmt->execute();

    $result = $stmt->get_result();
    $numRows = $result->num_rows;
    if ($numRows > 0) {
        $searchResults = $result->fetch_all(MYSQLI_ASSOC);
        return $searchResults;
    } 
}




function add($name, $email, $password, $role)
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

    if (empty($email)) {
        $error['email'] = "email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "email mast be validate Email";
    } else {
        $error['email'] = "";
    }

    if (empty($password)) {
        $error['password'] = "password is required";
        // } elseif (strlen($password) < 7) {
        //     $error['password'] = "password  must be >= 8";
    } else {
        $error['password'] = "";
    }

    if (empty($role)) {
        $error['role'] = "role is required";
    }

    if (empty($error['name']) && empty($error['email']) && empty($error['role']) && empty($error['password'])) {
        $password = password_hash($password, PASSWORD_DEFAULT);


        $stmt = $conn->prepare(createUsers());
        $stmt->bind_param("sssi", $name, $email, $password, $role);
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

    $stmt = $conn->prepare(editUser());
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

function update($name, $email, $password, $role, $id)
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

    if (empty($email)) {
        $error['email'] = "email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "email mast be validate Email";
    } else {
        $error['email'] = "";
    }

    if (empty($password)) {
        $error['password'] = "password is required";
        // } elseif (strlen($password) < 7) {
        //     $error['password'] = "password  must be >= 8";
    } else {
        $error['password'] = "";
    }

    if (empty($role)) {
        $error['role'] = "role is required";
    }

    if (empty($error['name']) && empty($error['email']) && empty($error['role']) && empty($error['password'])) {
        $stmt = $conn->prepare(updateUser());
        $stmt->bind_param("sssii", $name, $email, $password, $role, $id);
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
    $stmt = $conn->prepare(deleteUser());
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
  
    header('location:index.php');
}


function search($word)
{
    global $conn;
    $stmt = $conn->prepare(searchUser());
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