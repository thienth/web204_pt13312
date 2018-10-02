<?php 
require_once '../../commons/utils.php';

// kiem tra xem loai request co phai loai post hay khong
if($_SERVER['REQUEST_METHOD'] != "POST"){
	header('location: '.$adminUrl . 'danh-muc');
	die;
}

$name= trim($_POST['name']);
$desc= $_POST['desc'];

if($name == ""){
	header('location: '.$adminUrl . 'danh-muc/add.php?errName=Không để trống tên danh mục');
	die;
}

$sql = "select * from categories where name = '$name'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$checkDuplicate = $stmt->fetch();
if($checkDuplicate != false){
	header('location: '.$adminUrl . 'danh-muc/add.php?errName=Tên danh mục đã tồn tại!');
	die;
}


$sql = "insert into categories values (null, '$name', '$desc')";
$stmt = $conn->prepare($sql);
$stmt->execute();


header('location: '.$adminUrl . 'danh-muc?success=true');
die;
 ?>