<?php 
session_start();
$path = "./";
require_once $path.'../commons/utils.php';
if(isset($_SESSION['login']) == false || $_SESSION['login'] == null){
  header("location: ". $siteUrl . "login.php");
  die;
}

$countCateQuery = "select count(*) as total from categories";
$stmt = $conn->prepare($countCateQuery);
$stmt->execute();
$totalCate = $stmt->fetch();

$countProQuery = "select count(*) as total from products";
$stmt = $conn->prepare($countProQuery);
$stmt->execute();
$totalPro = $stmt->fetch();

$countCommentQuery = "select count(*) as total from comments";
$stmt = $conn->prepare($countCommentQuery);
$stmt->execute();
$totalComment = $stmt->fetch();

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
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
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
                <?= $totalCate['total'] ?>
              </h3>

              <p>Danh mục</p>
            </div>
            <div class="icon">
              <i class="fa fa-list"></i>
            </div>
            <a 
              href="<?= $adminUrl?>danh-muc" 
              class="small-box-footer">Quản lý danh mục <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $totalPro['total']?></h3>

              <p>Sản phẩm</p>
            </div>
            <div class="icon">
              <i class="fa fa-cubes"></i>
            </div>
            <a 
              href="<?= $adminUrl?>san-pham" 
              class="small-box-footer">Quản lý sản phẩm <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $totalComment['total']?></h3>

              <p>Phản hồi</p>
            </div>
            <div class="icon">
              <i class="fa fa-mail-forward"></i>
            </div>
            <a 
              href="<?= $adminUrl?>phan-hoi" 
              class="small-box-footer">Danh sách phản hồi <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
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
