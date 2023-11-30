<?php

$chefs = "SELECT * FROM chefs";
$resultChefs = $conn->query($chefs);
$resultChef = $conn->query($chefs);

$menu = "SELECT menu.* , chefs.name as 'nomChef' FROM menu inner join chefs ON chefs.id = menu.chef_id";
$resultMenu = $conn->query($menu);

if (isset($_POST['submit'])) {
	if (!empty($_POST['name'])&& !empty($_POST['selectChef'])) {
		$name = $_POST['name'];
		$chef = $_POST['selectChef'];
		$stmt = "INSERT INTO menu(name, chef_id) VALUES ('$name', $chef)";
		mysqli_query($conn, $stmt);
		$_POST['name'] = "";
		$_POST['selectChef'] = "";
		$check = "success";
		$resultMenu = $conn->query($menu);
	} else {
		$check = "error";
	}
}

if (isset($_POST['submitUpdate'])) {
	if (!empty($_POST['name'])) {
		$name = $_POST['name'];
		$chef = $_POST['selectChef'];
		$id = $_POST['id'];
		$stmt = "update  menu set  name='$name', chef_id='$chef' where id=$id";
		mysqli_query($conn, $stmt);
		$_POST['name'] = "";
		$check = "success";
		$resultMenu = $conn->query($menu);
	} else {
		$check = "error";
	}
}

if (isset($_POST['delete'])) {
	$id = $_POST['id'];
	$stmt = "delete from menu  where id=$id";
	mysqli_query($conn, $stmt);
	$resultMenu = $conn->query($menu);
	$check = "success";
}

if (isset($_GET['searchSubmit'])) {
	$searshWord = $_GET['searchInput'];
	$stmt = "SELECT menu.*, chefs.name AS 'nomChef'
	FROM menu
	INNER JOIN chefs ON chefs.id = menu.chef_id
	WHERE menu.id = '$searshWord' OR menu.name LIKE '%$searshWord%' OR chefs.name LIKE '%$searshWord%'";
	mysqli_query($conn, $stmt);
	$resultMenu = $conn->query($stmt);


}




?>