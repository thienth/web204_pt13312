<?php 
$path = "../";
require_once $path.'../commons/utils.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POLY | Thêm tài khoản</title>
  <?php include_once $path.'_share/top_asset.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include_once $path.'_share/header.php'; ?>
  
  <?php include_once $path.'_share/sidebar.php'; ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm tài khoản
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= $adminUrl?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Thêm tài khoản</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form action="<?= $adminUrl?>tai-khoan/save-add.php" method="post">
          <div class="col-md-6">
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control">
              <?php if (isset($_GET['errEmail'])): ?>
                <span class="text-danger"><?= $_GET['errEmail'] ?></span>
              <?php endif ?>
            </div>
            <div class="form-group">
              <label>Tên</label>
              <input type="text" name="fullname" class="form-control">
            </div>
            <div class="form-group">
              <label>Mật khẩu</label>
              <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
              <label>Xác nhận mật khẩu</label>
              <input type="password" name="cfpassword" class="form-control">
            </div>
            <div class="form-group">
              <label>Quyền</label>
              <select name="role" class="form-control">
                <?php foreach (USER_ROLES as $key => $value): ?>
                  
                  <option value="<?= $value?>"><?= $key ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="text-right">
              <a href="<?= $adminUrl?>tai-khoan" class="btn btn-danger btn-xs">Huỷ</a>
              <button class="btn btn-xs btn-primary" type="submit">Lưu</button>
            </div>
          </div>
        </form>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include_once $path.'_share/footer.php'; ?>
</div>
<!-- ./wrapper -->

<?php include_once $path.'_share/bottom_asset.php'; ?>
</body>
</html>
