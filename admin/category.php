<?php include 'header.php' ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý category
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <?php 
          echo '<pre>';
          // print_r($_FILES);
          // print_r($_POST);
          echo '</pre>';
          if (!empty($_POST['name'])) {
            $name = $_POST['name'];
            $image = $_POST['image'];
            $status = $_POST['status'];

            $sql = "INSERT INTO category(name,status,image) VALUES('$name','$status','$image')";

            if (mysqli_query($conn,$sql)) { // true, false
              // chuyển hường, thống báo thành công...
              header('location: category.php'); // về trang danh sách
            }else{
              echo mysqli_error($conn);
            }
          }
          ?>
          <div class="row">
            <div class="col-md-3">
            <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Tên Danh muc</label>
              <input name="name" class="form-control" placeholder="Tên danh mục..">
            </div>
             <div class="form-group">
              <label for="">Ảnh</label>
              <input type="hidden" name="image" value="" id="image">
              <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>chọn ảnh</a>
              <hr>
              <img src="" alt="" id="sow_img" width="100%" height="auto">
            </div>
            <div class="form-group">
              <label for="">Trạng thái</label>
             <div class="radio">
               <label for="show">
                 <input type="radio" id="show" name="status" value="1"> Hiện
               </label>
                <label for="hide">
                 <input type="radio" id="hide" name="status" value="0"> Ẩn
               </label>
             </div>
            </div> 
             <div class="form-group">
              <button type="" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
            </div>
          </form> </div>
            <div class="col-md-9">
              <?php include 'category-table.php' ?>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php'; ?>

<div class="modal fade" id="modal-id">
  <div class="modal-dialog" style="width: 90%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <iframe src="http://localhost/do_an_rcq/file/dialog.php?field_id=image" style="width: 100%; height: 500px; overflow-y: auto; border: none"></iframe>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('#modal-id').on('hide.bs.modal',function(){
    var _img = $('input#image').val();
    var _link ='../public/uploads/'+_img;
    $('img#sow_img').attr('src',_link);
  })
</script>