<?php
session_start();
require '../../database/connection.php';

if (!empty($_SESSION['name'])) {
	if (isset($_SERVER['HTTP_REFERER'])) {
		header("Location: " . $_SERVER['HTTP_REFERER']);
		exit();
	} else {
		header("Location:/youcode/dash/index.php");
		exit();
	}
}

if (isset($_POST['submit'])) {
if (!empty($_POST['name']) && strlen(trim($_POST['name'])) > 2 && !empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && strlen($_POST['confirm_password']) > 7 && $_POST['confirm_password'] === $_POST['password']) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$emailCheck = mysqli_query($conn, "select email from users where email = '$email'");
		if (!(mysqli_num_rows($emailCheck) > 0)) {
			$stmt = "INSERT INTO `users`( `name`, `email`, `password`) VALUES ('$name','$email','$password')";
			mysqli_query($conn, $stmt);
			// var_dump($name);
			session_start() ;
			$_SESSION['name'] = $name;  
			header("Location: ../../index.php");
			$check = "success";
		} else {
			$check = "error";
		}
	} else {
		$check = "error";
	}
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
                    <input type="text" name="name" value="<?php echo isset($_POST['submit']) ? $_POST['name'] : ''; ?>">
                    <label>Name</label>
                </div>
                <div class="user-box">
                    <input type="text" name="email"
                        value="<?php echo isset($_POST['submit']) ? $_POST['email'] : ''; ?>">
                    <label>Email</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password">
                    <label>Password</label>
                </div>
                <div class="user-box">
                    <input type="password" name="confirm_password">
                    <label>Confirm Password</label>
                </div>
                <div class="user-box">
                    <input type="submit" name="submit" value="Register"  class="w-full p-2 m-6   text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700  border-2 border-white rounded-full dark:border-gray-800">
                </div>
                you have account <a href="login.php" class="ms-2 text-blue-500">Here</a>
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