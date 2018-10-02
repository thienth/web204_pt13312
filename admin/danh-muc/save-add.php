<?php 
require_once '../../commons/utils.php';

// kiem tra xem loai request co phai loai post hay khong
if($_SERVER['REQUEST_METHOD'] != "POST"){
	header('location: '.$adminUrl . 'danh-muc');
	die;
}

$name= trim($_POST['name']);
$desc= $_POST['desc'];

$sql = "insert into categories values (null, '$name', '$desc')";
$stmt = $conn->prepare($sql);
$stmt->execute();


header('location: '.$adminUrl . 'danh-muc?success=true');
die;
 ?>