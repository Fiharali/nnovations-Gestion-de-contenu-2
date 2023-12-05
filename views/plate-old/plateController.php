
<?php

$chefs = "SELECT * FROM menu";
$resultChefs = $conn->query($chefs);
$resultChef = $conn->query($chefs);


$plate = "SELECT plate.* , menu.name as 'nomMenu' FROM plate inner join menu ON menu.id = plate.menu_id;";
$resultMenu = $conn->query($plate);
// var_dump($resultMenu->fetch_assoc());


if (isset($_POST['submit'])) {
	if (!empty($_POST['name']) && !empty($_POST['price'])&&  !empty($_POST['selectMenu'])) {
		$name = $_POST['name'];
		$price = $_POST['price'];
		$menu = $_POST['selectMenu'];
		$stmt = "INSERT INTO plate(name, menu_id,price) VALUES ('$name', $menu, $price)";
		mysqli_query($conn, $stmt);
		$_POST['name'] = "";
		$_POST['price'] = "";
		$check = "success";
		$resultMenu = $conn->query($plate);
	} else {
		$check = "error";
	}
}

if (isset($_POST['submitUpdate'])) {
	if (!empty($_POST['name'])) {
		$name = $_POST['name'];
		$price = $_POST['price'];
		$menu = $_POST['selectMenu'];
		$id = $_POST['id'];
		$stmt = "update  plate set  name='$name', menu_id='$menu',price=$price  where id=$id";
		mysqli_query($conn, $stmt);
		$_POST['name'] = "";
		$_POST['price'] = "";
		$check = "success";
		$resultMenu = $conn->query($plate);
	} else {
		$check = "error";
	}
}

if (isset($_POST['delete'])) {
	$id = $_POST['id'];
	$stmt = "delete from plate  where id=$id";
	mysqli_query($conn, $stmt);
	$resultMenu = $conn->query($plate);
	$check = "success";
}

if (isset($_GET['searchSubmit'])) {
	$searshWord = $_GET['searchInput'];
	$stmt = "SELECT plate.*, menu.name AS 'nomMenu'
	FROM plate
	INNER JOIN menu ON menu.id = plate.menu_id
	WHERE plate.id = '$searshWord' OR plate.name LIKE '%$searshWord%' OR menu.name LIKE '%$searshWord%'";
	mysqli_query($conn, $stmt);
	$resultMenu = $conn->query($stmt);
}


?>