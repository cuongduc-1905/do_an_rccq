<?php 
  include 'header.php' ;
  $id = $_GET['id'];
  $sql_1 = "SELECT * FROM banner WHERE id=$id";
  $query = mysqli_query($conn,$sql_1);
  $value = mysqli_fetch_assoc($query)
?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chỉnh sửa banner
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <?php 
          // echo '<pre>';
          // // print_r($_FILES);
          // // print_r($_POST);
          // echo '</pre>';
          // $link_image = $value['link_image'];
          // if (!empty($_FILES['link_image']['name'])) {
          //   $file = $_FILES['link_image'];
          //   $link_image = $file['name'];
          //   $tmp_name = $file['tmp_name'];
          //   move_uploaded_file($tmp_name, '../public/uploads/'.$link_image);
          // }
          if (!empty($_POST['name'])) {
            
            $name = $_POST['name'];
            $link_image = $_POST['link_image'];
            if ($link_image == null) {
              $link_image = $value['link_image'];
            }
            $link_href = $_POST['link_href'];
            $status = $_POST['status'];
            $sql = "UPDATE banner SET name='$name',link_href='$link_href',link_image='$link_image',status='$status' WHERE id=$id";

            if (mysqli_query($conn,$sql)) { // true, false
              // chuyển hường, thống báo thành công...
              header('location: banner.php'); // về trang danh sách
            }else{
              echo mysqli_error($conn);
            }
          }
          ?>
          <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Tên banner</label>
              <input name="name" class="form-control" placeholder="Tên banner" value="<?php echo $value['name'] ?>">
            </div>
            <div class="form-group">
              <label for="">Link banner</label>
              <input name="link_href" class="form-control" placeholder="Link banner" value="<?php echo $value['link_href'] ?>">
            </div>
            <div class="form-group">
              <label for="">Trạng thái</label>
             <div class="radio">
               <label for="show">
                 <input type="radio" id="show" name="status" value="1" <?php echo $value['status'] ==1? 'checked' :''; ?>> Hiện
               </label>
                <label for="hide">
                 <input type="radio" id="hide" name="status" value="0" <?php echo $value['status'] ==0? 'checked' :''; ?>> Ẩn
               </label>
             </div>
            </div>
            <div class="form-group">
              <label for="">Ảnh banner</label>
              <input type="hidden" name="link_image" id="link_image">
              <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>chọn ảnh</a>
              <hr>
              <img src="" alt="" id="sow_image" class="img-responsive" width="120px">
            </div>
             <div class="form-group">
              <button type="" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
            </div>
          </form>
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
        <iframe src="http://localhost/do_an_rcq/file/dialog.php?field_id=link_image" style="width: 100%; height: 500px; border: none; overflow-y: autu"></iframe>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
   $('#modal-id').on('hide.bs.modal',function(){
    var _img = $('input#link_image').val();
    var _link ='../public/uploads/'+_img;
    $('img#sow_image').attr('src',_link);
   })
</script>