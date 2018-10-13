<?php 
require_once '../../commons/utils.php';

// kiem tra xem loai request co phai loai post hay khong
if($_SERVER['REQUEST_METHOD'] != "POST"){
	header('location: '.$adminUrl . 'tai-khoan');
	die;
}

$email= trim($_POST['email']);
$fullname= trim($_POST['fullname']);
$password= $_POST['password'];
$cfpassword= $_POST['cfpassword'];
$role= $_POST['role'];

$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "insert into users 
			(email, fullname, password, role) 
		values 
			('$email', '$fullname', '$password', '$role')";
$stmt = $conn->prepare($sql);
$stmt->execute();


header('location: '.$adminUrl . 'tai-khoan?success=true');
die;
 ?>