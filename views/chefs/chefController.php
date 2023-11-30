
<?php

$sql = "SELECT * FROM chefs";
$result = $conn->query($sql);

if (isset($_POST['submit'])) {
	if (!empty($_POST['name']) && !empty($_POST['age'])) {
		$name = $_POST['name'];
		$age = $_POST['age'];
		$stmt = "INSERT INTO chefs(name, age) VALUES ('$name', '$age')";
		mysqli_query($conn, $stmt);
		$_POST['name'] = "";
		$_POST['age'] = "";
		$check = "success";
		$result = $conn->query($sql);
	} else {
		$check = "error";
	}
}

if (isset($_POST['submitUpdate'])) {
	if (!empty($_POST['name']) && !empty($_POST['age'])) {
		$name = $_POST['name'];
		$age = $_POST['age'];
		$id = $_POST['id'];
		$stmt = "update  chefs set  name='$name', age='$age' where id=$id";
		mysqli_query($conn, $stmt);
		$_POST['name'] = "";
		$_POST['age'] = "";
		$check = "success";
		$result = $conn->query($sql);
	} else {
		$check = "error";
	}
}

if (isset($_POST['delete'])) {
	$id = $_POST['id'];
	$stmt = "delete from chefs  where id=$id";
	mysqli_query($conn, $stmt);
	$result = $conn->query($sql);
}

if (isset($_GET['searchSubmit'])) {
	$searshWord = $_GET['searchInput'];
	$stmt = "select *  from chefs  where id like '%$searshWord%' or name like '%$searshWord%' or age like '%$searshWord%'";
	mysqli_query($conn, $stmt);
	$result = $conn->query($stmt);
}


?>