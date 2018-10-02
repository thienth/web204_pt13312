<?php 
require_once '../../commons/utils.php';
$cateId = $_GET['id'];

// kiem tra xem id co ton tai trong csdl
$sql = "select * from categories where id = $cateId";
$stmt = $conn->prepare($sql);
$stmt->execute();

$cate = $stmt->fetch();
if(!$cate){
	header('location: '. $adminUrl . 'danh-muc');
	die;
}

$sql = "delete from products where cate_id = $cateId";
$stmt = $conn->prepare($sql);
$stmt->execute();


$sql = "delete from categories where id = $cateId";
$stmt = $conn->prepare($sql);
$stmt->execute();

header('location: '. $adminUrl . 'danh-muc');
die;

 ?>