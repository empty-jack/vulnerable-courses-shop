<?php

error_reporting(0);

include("config.php");

if (isset($_POST["name"]) && !empty($_POST["name"]) &&
	isset($_POST["email"]) && !empty($_POST["email"]) &&
	isset($_POST["phone"]) && !empty($_POST["phone"]) &&
	isset($_POST["comment"]) && !empty($_POST["comment"]) &&
	isset($_POST["productID"]) && !empty($_POST["productID"]) &&
	isset($_POST["price"])) {
	
	try {
		$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "INSERT INTO orders (name,email,phone,comment,product_id,price) VALUES (:name,:email,:phone,:comment,:product_id,:price)";

		$stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute(array(':name' => $_POST["name"],
							 ':email' => $_POST["email"],
							 ':phone' => $_POST["phone"],
							 ':comment' => $_POST["comment"],
							 ':product_id' => $_POST["productID"],
							 ':price' => $_POST["price"]));

		header("Location: /recipt.php?orderID=" . $pdo->lastInsertId());
		
		
	} catch (Exception $e) {
		header("Location: /index.php");
		echo $sql . "<br>" . $e->getMessage();
	}
	
} else {
	header("Location: /index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" value="Just some information in redirect">
</head>
<body>
	<?php
	if ( is_numeric($_POST["price"]) && intval($_POST["price"]) < 5 ) {
			echo "Parameter Tampering will come in handy ;)";
		}
	?>
</body>
</html>