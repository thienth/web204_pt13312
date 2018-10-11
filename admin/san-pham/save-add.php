<?php 
require_once '../../commons/utils.php';

// kiem tra xem loai request co phai loai post hay khong
if($_SERVER['REQUEST_METHOD'] != "POST"){
	header('location: '.$adminUrl . 'san-pham');
	die;
}

$product_name= trim($_POST['product_name']);
$cate_id= $_POST['cate_id'];
$list_price= $_POST['list_price'];
$sell_price= $_POST['sell_price'];
$status= $_POST['status'];
$detail= $_POST['detail'];
$file = $_FILES['image'];
if($file['size'] > 0){
	// lay duoi file
	$path = $file['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);

	// tao ra ten file moi
	$filename = 'img/san-pham/'.uniqid() . '.' . $ext;
	// luu file vao trong thu muc
	move_uploaded_file($file['tmp_name'], "../../".$filename);
}else{
	$filename = 'img/default/default-picture.png';
}

$sql = "insert into products 
			(product_name, 
			cate_id,
			list_price,
			sell_price,
			status,
			detail,
			image) 
		values 
			(:product_name, 
			:cate_id,
			:list_price,
			:sell_price,
			:status,
			:detail,
			:image) ";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':product_name', $product_name);
$stmt->bindParam(':cate_id', $cate_id);
$stmt->bindParam(':list_price', $list_price);
$stmt->bindParam(':sell_price', $sell_price);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':detail', $detail);
$stmt->bindParam(':image', $filename);
$stmt->execute();


header('location: '.$adminUrl . 'san-pham');
die;
 ?>