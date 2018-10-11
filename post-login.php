<?php 
session_start();
require_once './commons/utils.php';

// kiem tra xem loai request co phai loai post hay khong
if($_SERVER['REQUEST_METHOD'] != "POST"){
	header('location: '.$siteUrl );
	die;
}
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "select * from users where email = '$email'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$user = $stmt->fetch();

if($user == false 
	|| password_verify($password, $user['password']) == false){
	header('location: '.$siteUrl. "login.php?msg=Sai email/mật khẩu" );
	die;
}

$_SESSION['login'] = $user;
header("location: ". $adminUrl);
die;

 ?>