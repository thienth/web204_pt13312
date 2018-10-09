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

// lay duoi file
$path = $file['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);

// tao ra ten file moi
$filename = 'img/san-pham/'.uniqid() . '.' . $ext;
// luu file vao trong thu muc
move_uploaded_file($file['tmp_name'], "../../".$filename);

dd(1);

$sql = "insert into categories 
			(name, description) 
		values 
			('$name', '$description')";
$stmt = $conn->prepare($sql);
$stmt->execute();


header('location: '.$adminUrl . 'danh-muc?success=true');
die;
 ?>