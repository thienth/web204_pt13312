<?php 
$path = "../";
require_once $path.'../commons/utils.php';
$pageNumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
$pageSize = 5;

$offset = ($pageNumber-1)*$pageSize;
$sql = "select
          p.*,
          c.name as catename
        from products p
        join categories c
          on p.cate_id = c.id
        order by id asc
        limit $offset, $pageSize";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll();

$sql = "select count(*) as total from products";
$stmt = $conn->prepare($sql);
$stmt->execute();
$totalProduct = $stmt->fetch();

$totalPage = ceil($totalProduct['total']/$pageSize);

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POLY | Danh sách sản phẩm</title>
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
        <small>Sản phẩm</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= $adminUrl?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sản phẩm</li>
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
                  <th>#</th>
                  <th>Tên sản phẩm</th>
                  <th>Danh mục</th>
                  <th style="width: 100px">Ảnh</th>
                  <th>Giá</th>
                  <th>Giá KM</th>
                  <th>Views</th>
                  <th style="width: 120px">
                    <a 
                      href="<?= $adminUrl ?>san-pham/add.php" 
                      class="btn btn-xs btn-success">
                      <i class="fa fa-plus"></i>  Thêm
                    </a>
                  </th>
                </tr>

                <?php foreach ($products as $item): ?>
                  
                  <tr>
                    <td><?= $item['id']?>.</td>
                    <td><?= $item['product_name']?></td>
                    <td>
                      <?= $item['catename']?>
                    </td>
                    <td>
                      <img src="<?= $siteUrl . $item['image']?>" class="img-responsive">
                    </td>
                    <td>
                      <?= $item['list_price']?>
                    </td>
                    <td>
                      <?= $item['sell_price']?>
                    </td>
                    <td>
                      <?= $item['views']?>
                    </td>
                    <td>
                      <a 
                        href="<?= $adminUrl ?>san-pham/edit.php?id=<?= $item['id']?>" 
                        class="btn btn-xs btn-primary">
                        <i class="fa fa-pencil"></i>  Sửa
                      </a>
                      <a 
                        href="javascript:;" 
                        linkurl="<?= $adminUrl ?>san-pham/remove.php?id=<?= $item['id']?>" 
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
              <ul id="pagination" class="pagination-sm"></ul>
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

  $('#pagination').twbsPagination({
      totalPages: <?= $totalPage?>,
      visiblePages: 3,
      initiateStartPageClick: false,
      startPage: <?= $pageNumber?>,
      onPageClick: function (event, page) {
        var url = '<?= $adminUrl?>san-pham';
        url += "?page=" + page;
        window.location.href = url;
      }
  });

</script>
</body>
</html>
