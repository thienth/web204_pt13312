<?php 
require_once '../../commons/utils.php';

// kiem tra xem loai request co phai loai post hay khong
if($_SERVER['REQUEST_METHOD'] != "POST"){
	header('location: '.$adminUrl . 'san-pham');
	die;
}

$id = $_POST['id'];
$product_name= trim($_POST['product_name']);
$cate_id= $_POST['cate_id'];
$list_price= $_POST['list_price'];
$sell_price= $_POST['sell_price'];
$status= $_POST['status'];
$detail= $_POST['detail'];
$file = $_FILES['image'];

$filename = false;
if($file['size'] > 0){
	// lay duoi file
	$path = $file['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);

	// tao ra ten file moi
	$filename = 'img/san-pham/'.uniqid() . '.' . $ext;
	// luu file vao trong thu muc
	move_uploaded_file($file['tmp_name'], "../../".$filename);
}

$sql = "update products
		set 
			product_name = :product_name, 
			cate_id = :cate_id,
			list_price = :list_price,
			sell_price = :sell_price,
			status = :status,
			detail = :detail";
if($filename != false){
	$sql .= ", image = :image";
}

$sql .= " where id = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':product_name', $product_name);
$stmt->bindParam(':cate_id', $cate_id);
$stmt->bindParam(':list_price', $list_price);
$stmt->bindParam(':sell_price', $sell_price);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':detail', $detail);
if($filename != false){
	$stmt->bindParam(':image', $filename);
}
$stmt->bindParam(':id', $id);
$stmt->execute();


header('location: '.$adminUrl . 'san-pham');
die;
 ?>