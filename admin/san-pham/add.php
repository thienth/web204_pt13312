<?php 
$path = "../";
require_once $path.'../commons/utils.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POLY | Thêm sản phẩm</title>
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
        Thêm danh mục
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= $adminUrl?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Thêm sản phẩm</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <form 
          enctype="multipart/form-data"
          action="<?= $adminUrl?>san-pham/save-add.php" 
          method="post">
          <div class="col-md-6">
            <div class="form-group">
              <label>Tên sản phẩm</label>
              <input type="text" name="product_name" class="form-control">
            </div>
            <div class="form-group">
              <label>Danh mục</label>
              <select class="form-control" name="cate_id">
                <option>danh muc 1</option>
                <option>danh muc 1</option>
                <option>danh muc 1</option>
                <option>danh muc 1</option>
                <option>danh muc 1</option>
                <option>danh muc 1</option>
              </select>
            </div>
            <div class="form-group">
              <label>Giá trưng bày</label>
              <input type="number" name="list_price" class="form-control">
            </div>
            <div class="form-group">
              <label>Giá khuyến mại</label>
              <input type="number" name="sell_price" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <img id="proImg" src="<?= $siteUrl?>img/default/default-picture.png" class="img-responsive">
              </div>
            </div>
            <div class="form-group">
              <label>Ảnh sản phẩm</label>
              <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
              <label>Trạng thái</label> &nbsp;
              <input type="radio" name="status" value="-1"> Inactive &nbsp;
              <input type="radio" name="status" value="1"> Active 
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Chi tiết sản phẩm</label>
              <textarea name="detail" class="form-control" rows="10"></textarea>
            </div>
          </div>
          <div class="col-md-12 text-right">
            <a href="<?= $adminUrl?>san-pham" class="btn btn-sm btn-danger">Huỷ</a>
            <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
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
<script type="text/javascript">
  $(document).ready(function(){
    $('[name="detail"]').wysihtml5();

    var inputImage = document.querySelector(`[name="image"]`);
    inputImage.onchange = function(){

      var file = this.files[0];
      if(file == undefined){
        document.querySelector('#proImg').src = '<?= $siteUrl?>img/default/default-picture.png';
      }else{
        getBase64(file, '#proImg');
      }
    }
  });

  function getBase64(file, selector) {
     var reader = new FileReader();
     reader.readAsDataURL(file);
     reader.onload = function () {
      $(selector).attr('src', reader.result);
     };
     reader.onerror = function (error) {
       console.log('Error: ', error);
     };
  }
</script>
</body>
</html>
