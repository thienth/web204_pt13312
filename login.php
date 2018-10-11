<?php 
require_once './commons/utils.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
</head>
<body>
	<form action="<?= $siteUrl ?>post-login.php" method="post">
		<?php if (isset($_GET['msg'])): ?>
			<span style="color: red"><?= $_GET['msg'] ?></span>
		<?php endif ?>
		<div>
			Email: <input type="email" name="email">
		</div>
		<div>
			Password: <input type="password" name="password">
		</div>
		<div>
			<button type="submit">Dang nhap</button>
		</div>
	</form>

</body>
</html>