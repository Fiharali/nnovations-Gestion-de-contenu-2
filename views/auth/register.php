<?php
session_start();
require '../../database/connection.php';
include '../../app/controllers/auth/register.php';

if (!empty($_SESSION['name'])) {
	if (isset($_SERVER['HTTP_REFERER'])) {
		header("Location: " . $_SERVER['HTTP_REFERER']);
		exit();
	} else {
		header("Location:/youcode/dash/views/client/index.php");
		exit();
	}
}


if (isset($_POST['submit'])) {
    register($_POST['name'],$_POST['email'],$_POST['password'],$_POST['confirm_password']);

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
    <title>Document</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/youcode/dash/assets/css/auth.css">
   
</head>

<body>
    <div class="">

        <div class="login-box">
            <h2 class="text-3xl">Register</h2>
            <form method="post" autocomplete="on">
                <div class="user-box">
                <span><?= isset($_POST['name']) ? $error['name'] : ''; ?></span>
                    <input type="text" name="name" value="<?php echo isset($_POST['submit']) ? $_POST['name'] : ''; ?>">
                    <label>Name</label>
                </div>
                <div class="user-box">
                <span><?= isset($_POST['email']) ? $error['email'] : ''; ?></span>
                    <input type="text" name="email"
                        value="<?php echo isset($_POST['submit']) ? $_POST['email'] : ''; ?>">
                    <label>Email</label>
                </div>
                <div class="user-box">
                <span><?= isset($_POST['password']) ? $error['password'] : ''; ?></span>
                    <input type="password" name="password">
                    <label>Password</label>
                </div>
                <div class="user-box">
                <span><?= isset($_POST['confirm_password']) ? $error['cPassword'] : ''; ?></span>
                    <input type="password" name="confirm_password">
                    <label>Confirm Password</label>
                </div>
                <div class="user-box">
                    <input type="submit" name="submit" value="Register"  class="w-full p-2 m-6   text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700  border-2 border-white rounded-full dark:border-gray-800">
                </div>
                you have account <a href="login.php" class="text-blue-500 ms-2">Here</a>
            </form>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

    <script>
    let jsCheck = <?php
						echo json_encode($check);
						?>;
    console.log(jsCheck);
    if (jsCheck == 'success') {
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "You are successfully registered",
            showConfirmButton: false,
            timer: 1500
        });
    } else if (jsCheck == 'error') {
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: "You are not registered",
            showConfirmButton: false,
            timer: 1500
        });
    } else {

    }
    </script>
</body>

</html>