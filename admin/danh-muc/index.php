<?php 
$path = "../";
require_once $path.'../commons/utils.php';
$catesQuery = "select 
                c.*,
                (select count(*) from products where cate_id = c.id) as total_product
              from categories c";
$stmt = $conn->prepare($catesQuery);
$stmt->execute();
$cates = $stmt->fetchAll();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <?php include_once $path.'_share/top_asset.php'; ?>
  <link rel="stylesheet" href="<?= $adminAssetUrl?>plugins/Toastr/toastr.min.css"></style>  
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
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <form>
                <div class="row">
                  <div class="col-md-6">
                    
                    <div class="form-group">
                      <input type="text" name="keyword" class="form-control">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Tên</th>
                  <th>Sản phẩm</th>
                  <th style="width: 240px">Mô tả</th>
                  <th style="width: 120px">
                    <a 
                      href="<?= $adminUrl ?>danh-muc/add.php" 
                      class="btn btn-xs btn-success">
                      <i class="fa fa-plus"></i>  Thêm
                    </a>
                  </th>
                </tr>

                <?php foreach ($cates as $item): ?>
                  
                  <tr>
                    <td><?= $item['id']?>.</td>
                    <td><?= $item['name']?></td>
                    <td>
                      <?= $item['total_product']?>
                    </td>
                    <td>
                      <?= $item['description']?>
                    </td>
                    <td>
                      <a 
                        href="<?= $adminUrl ?>danh-muc/edit.php?id=<?= $item['id']?>" 
                        class="btn btn-xs btn-primary">
                        <i class="fa fa-pencil"></i>  Sửa
                      </a>
                      <a 
                        href="javascript:;" 
                        linkurl="<?= $adminUrl ?>danh-muc/remove.php?id=<?= $item['id']?>" 
                        class="btn btn-xs btn-danger btn-remove">
                        <i class="fa fa-trash"></i>  Xoá
                      </a>
                    </td>
                  </tr>
                <?php endforeach ?>
              
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>
          </div>
        </div>  
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include_once $path.'_share/footer.php'; ?>
</div>
<!-- ./wrapper -->

<?php include_once $path.'_share/bottom_asset.php'; ?>

<script type="text/javascript" src="<?= $adminAssetUrl?>plugins/Toastr/toastr.min.js""></script>


<script type="text/javascript">
  <?php if (isset($_GET['success']) && $_GET['success'] == true) {
    ?>
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-bottom-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    toastr.success('Thêm danh mục thành công!')
    <?php
  } ?>

  $('.btn-remove').on('click', function(){
    var url = $(this).attr('linkurl');
    var conf = confirm('Bạn có chắc chắn muốn xoá danh mục này hay không?');

    if(conf){
      window.location.href = url;
    }
  });
</script>
</body>
</html>
