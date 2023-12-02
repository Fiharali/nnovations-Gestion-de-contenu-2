<?php

include __DIR__ . '/../../model/auth/register.php';
$error = array(
    'name' => '',
    'email' => '',
    'password' => '',
    'cPassword' => ''
);
function register($name, $email, $password, $cPassword)
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
    } elseif (strlen($password) < 7) {
        $error['password'] = "password  must be >= 8";
    } else if ($password != $cPassword) {
        $error['password'] = "password d'ont match ";
    } else {
        $error['password'] = "";
    }


    if (empty($error['name']) && empty($error['email']) && empty($error['password'])) {


        $stmtCheck = $conn->prepare(checkUser());
        $stmtCheck->bind_param("s", $email);
        $stmtCheck->execute();

        $result = $stmtCheck->get_result();
        $numRows = $result->num_rows;
        if ($numRows <= 0) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare(registerUsers());
            $stmt->bind_param("sss", $name, $email, $password);
            $stmt->execute();
            $user = $result->fetch_assoc();
            $_SESSION['name'] = $name;
            $_SESSION['id'] = mysqli_insert_id($conn);
            $_SESSION['role'] = 3;
            // echo $_SESSION['name'].$_SESSION['id'].$_SESSION['role'];
            if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2) {
                header("location:../../views/users/index.php");
            } else {
                header("location:../../views/client/index.php");
            }
            $stmt->close();
        }


        $check = "success";
    } else {
        $check = "error";
    }

}