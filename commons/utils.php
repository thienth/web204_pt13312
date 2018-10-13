<?php 

$siteUrl = "http://localhost/pt13312/";
$adminUrl = "http://localhost/pt13312/admin/";
$adminAssetUrl = "http://localhost/pt13312/admin/adminlte/";


$host = "127.0.0.1";
$dbname = "web204";
$dbusername = "root";
$dbpwd = "123456";
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", 
		$dbusername, $dbpwd);

const USER_ROLES = [
	'Admin' => 500,
	"Super Moderator" => 400,
	"Moderator" => 300,
	"Member" => 1
];


function dd($vari){
	echo "<pre>";
	var_dump($vari);
	die;
}

 ?>