<?php 
$path = "../";
require_once $path.'../commons/utils.php';
$cateId = $_GET['id'];
$sql = "select * from categories where id = $cateId";
$stmt = $conn->prepare($sql);
$stmt->execute();

$cate = $stmt->fetch();

if(!$cate){
  header('location: ' . $adminUrl . 'danh-muc');
  die;
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POLY | Sửa danh mục</title>
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
        Sửa danh mục
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= $adminUrl?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Thêm danh mục</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form action="<?= $adminUrl?>danh-muc/save-edit.php" method="post">
          <input type="hidden" name="id" value="<?= $cate['id']?>">
          <div class="col-md-6">
            <div class="form-group">
              <label>Tên danh mục</label>
              <input type="text" 
                name="name" 
                placeholder="vd: Socola, Bánh dẻo,..." 
                class="form-control" 
                value="<?= $cate['name']?>"
                >
              <?php if (isset($_GET['errName'])): ?>
                <span class="text-danger"><?= $_GET['errName'] ?></span>
              <?php endif ?>
            </div>
            <div class="form-group">
              <label>Mô tả</label>
              <textarea name="description" class="form-control" rows="5"><?= $cate['description']?></textarea>
            </div>
            <div class="text-right">
              <a href="<?= $adminUrl?>danh-muc" class="btn btn-danger btn-xs">Huỷ</a>
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
