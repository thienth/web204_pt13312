<?php 
require_once '../../commons/utils.php';

// kiem tra xem loai request co phai loai post hay khong
if($_SERVER['REQUEST_METHOD'] != "POST"){
	header('location: '.$adminUrl . 'danh-muc');
	die;
}

$id= trim($_POST['id']);
$name= trim($_POST['name']);
$description= $_POST['description'];

if($name == ""){
	header('location: '.$adminUrl . 'danh-muc/edit.php?id='.$id.'&errName=Không để trống tên danh mục');
	die;
}

$sql = "select * 
		from categories 
		where name = '$name'
			and id <> $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$checkDuplicate = $stmt->fetch();
if($checkDuplicate != false){
	header('location: '.$adminUrl . 'danh-muc/edit.php?id='.$id.'&errName=Tên danh mục đã tồn tại!');
	die;
}


$sql = "update categories
		set 
			name = '$name',
			description = '$description'
		where id = $id";
$stmt = $conn->prepare($sql);
$stmt->execute();


header('location: '.$adminUrl . 'danh-muc?success=true');
die;
 ?>