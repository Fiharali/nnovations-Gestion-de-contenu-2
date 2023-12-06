<?php
include __DIR__ . '/../../model/auth/login.php';



$error = array(
    'email' => '',
    'password' => '',

);

function login($email, $password)
{
    global $conn;
    global $error;
    global $check;


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



    if (empty($error['email']) &&  empty($error['password'])) {

        $stmt = $conn->prepare(loginUser());
        $stmt->bind_param("s",  $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $check = "success";
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user["password"])) {
                $_SESSION['name'] = $user['name'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['role'] = $user['role_id'];
                // echo $_SESSION['name'].$_SESSION['id'].$_SESSION['role'];
                if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2) {
                    header("location:../../views/users/index.php");
                } else {
                    header("location:../../views/client/index.php");
                    // echo $_SESSION['role'] ;
                }
            } else {
                $error['password'] = "password is incorrect ";
                $check = "error";
            }
        } else {
            $error['email'] = "email is not registered";
            $check = "error";
            return null;
        }
    } else {
        $check = "error";
    }
}