<?php 
require_once './commons/utils.php';
if($_SERVER['REQUEST_METHOD'] !== "POST"){
	header("location: $siteUrl");
}

$productId = $_POST['productId'];
$email = $_POST['email'];
$content = $_POST['content'];


$sql = "insert into comments
			(email, content, product_id)
		values
			('$email', '$content', $productId)";
$stmt = $conn->prepare($sql);
$stmt->execute();

header("location: $siteUrl" . "chi-tiet.php?id=" . $productId);
 ?>