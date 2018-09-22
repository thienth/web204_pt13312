<?php 
require_once './commons/utils.php';
$productId = $_GET['id'];
if($productId == null){
	header("location: $siteUrl");
	die;
}

$sql = "select * from products where id = $productId";
$stmt = $conn->prepare($sql);
$stmt->execute();
$product = $stmt->fetch();

$commentSql = "select * from comments
				where product_id = $productId 
				order by id desc";
$stmt = $conn->prepare($commentSql);
$stmt->execute();
$comments = $stmt->fetchAll();

 ?>
 <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">

    <?php 
    include './_share/asset.php';
     ?>
	<title>Sản phẩm <?= $product['product_name']?></title>
</head>

<body>
    <?php 
    include './_share/header.php';
     ?>

	<div id="product">
		<div class="container">
			<div class="tittle-product">
				<h2>Sản phẩm <?= $product['product_name']?></h2>
			</div>
			<div class="row">
				<div class="col-md-6">
					<form action="submit_comment.php" method="post">
						<input type="hidden" name="productId" value="<?= $productId?>">
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label>Nội dung</label>
							<textarea class="form-control" rows="5" name="content"></textarea>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-sm btn-primary">Bình luận</button>
						</div>
					</form>
				</div>
				<div class="col-md-6">
					<?php foreach ($comments as $c): ?>
						<b><?= $c['email']?></b>
						<br>
						<p><?= $c['content']?></p>
						
					<?php endforeach ?>
				</div>
			</div>
			

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