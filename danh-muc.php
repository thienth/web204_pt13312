<?php 
require_once './commons/utils.php';
$cateId = $_GET['id'];
if($cateId == null){
	header("location: $siteUrl");
	die;
}

$sql = "select * 
		from categories
		where id = $cateId";
$stmt = $conn->prepare($sql);
$stmt->execute();
$category = $stmt->fetch();

if($category == false){
	header("location: $siteUrl");
	die;
}

$sql = "select *
		from products
		where cate_id = $cateId";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll();		

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">

    <?php 
    include './_share/asset.php';
     ?>
	<title>Danh mục <?= $category['name']?></title>
</head>

<body>
    <?php 
    include './_share/header.php';
     ?>

	<div id="product">
		<div class="container">
			<div class="tittle-product">
				<h2>Danh mục <?= $category['name']?></h2>
			</div>
			<?php foreach ($products as $product): ?>
				
				<div class="col-sm-4 col-xs-12">
					<div class="img-height">
						<img src="<?= $siteUrl . $product['image']?>" alt="">
					</div>
					<a class="title-name"><?= $product['product_name']?></a>
					<div class="text-center">
						Giá bán: <strike><b><?= $product['list_price']?> vnđ</b></strike>
						<br>
						Giá khuyến mại: <b><?= $product['sell_price']?> vnđ</b>
					</div>

					<div class="footer-product">
						<a href="<?= $siteUrl . "chi-tiet.php?id=" . $product['id']?>" class="details">Xem chi tiết</a>
					</div>
				</div>
			<?php endforeach ?>
			

		</div>
	</div>
	<div id="partner">
		<div class="container">
			<h2 class="title-product">Các đối tác</h2>
			<div class="partner-img col-md-3 col-xs-6">
				<img src="img/partner1.jpg" alt="">
			</div>
			<div class="partner-img col-md-3 col-xs-6">
				<img src="img/partner2.jpg" alt="">
			</div>
			<div class="partner-img col-md-3 col-xs-6">
				<img src="img/partner3.jpg" alt="">
			</div>
			<div class="partner-img col-md-3 col-xs-6">
				<img src="img/partner4.jpg" alt="">
			</div>
		</div>
	</div>
	<?php 
	include './_share/footer.php';
	 ?>
</body>

</html>