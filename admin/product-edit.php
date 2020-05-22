<?php include 'header.php';
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM product WHERE id = $id";
    $query = mysqli_query($conn,$sql1);
    $value = mysqli_fetch_assoc($query);

    $images = json_decode($value['image_list']);

    // print_r($images);
 ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Thêm mới sản phẩm
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <?php
        // $image = '';
        // if (!empty($_FILES['image']['name'])) {
        //   $file = $_FILES['image'];
        //   $image = $file['name'];
        //   $tmp_name = $file['tmp_name'];
        //   move_uploaded_file($tmp_name, '../public/uploads/'.$image);
        // }

        // if (!empty($_FILES['image_list']['name'])) {
        //   $fs = $_FILES['image_list'];

        //   $image_list = '$value[image_list[]]';
        //   for ($i=0; $i < count($fs['name']) ; $i++) { 
        //    $images = $file['name'][$i];
        //    $tmp_names = $file['tmp_name'][$i];
        //    $image_list = json_encode($fs['name']);
        //    move_uploaded_file($tmp_names, '../public/uploads/'.$images);
        //  }
        //  echo  $image_list;
       // }
       if (!empty($_POST['name'])) {
        $name = $_POST['name'];
        $image = $_POST['image'];
        if ($image == '') {
          $image = $value['image'];
        }
        $image_list = $_POST['image_list'];
        if ($image_list == '') {
          $image_list = $value['image_list'];
        }
        $price = $_POST['price'];
        $sale_price = $_POST['sale_price']; 
        $category_id = $_POST['category_id']; 
        $content = $_POST['content']; 
        $status = $_POST['status'];
        $sql = "UPDATE product SET name='$name',price='$price',sale_price='$sale_price',status='$status',image='$image',category_id='$category_id',content='$content',image_list='$image_list' Where id=$id  ";
            if (mysqli_query($conn,$sql)) { // true, false
              // chuyển hường, thống báo thành công...
              header('location: product.php'); // về trang danh sách
            }else{
              echo mysqli_error($conn);
            } 
          }
          ?>

          <form method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-9">
                <div class="form-group">
                  <label for="">Tên sản phẩm</label>
                  <input name="name" class="form-control" placeholder="Tên product" required="" value="<?php echo $value['name']?>">
                </div>
                <div class="form-group">
                  <label for="">Ảnh khác</label>
                      <input type="" name="image_list" id="image_list" value="<?php echo $value['image_list']; ?>">
                      <a class="btn btn-primary" data-toggle="modal" href='#modal-list'>chọn list ảnh</a>
                      <hr>
                   <!-- <div id="sow_image"></div> -->
                </div>
<hr>
                <div class="form-group">
                  <label for="">Nội dung</label>
                  <textarea name="content" id="content" class="form-control" rows="3"><?php echo $value['content']?></textarea>
                </div>
              </div>
              <div class="col-md-3">
               <div class="form-group">
                <?php 
                $sql = "SELECT * FROM category order by id DESC";
                $cats = mysqli_query($conn,$sql);
                ?>
                <label for="">Danh mục sản phẩm</label>
                <select name="category_id" id="input" class="form-control" required>
                  <?php foreach ($cats as $key => $cat) :?>
                    <?php if ($value['category_id']==$cat['id']) {?>
                      <option value="<?php echo $cat['id'] ?>" selected><?php echo $cat['name'] ?></option>
                    <?php }else{ ?>
                      <option value="<?php echo $cat['id'] ?>" ><?php echo $cat['name'] ?></option>
                    <?php } ?>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label for="">giá sản phẩm</label>
                <input name="price" class="form-control" placeholder="giá sản phẩm.." value="<?php echo $value['price']?>">
              </div>
              <div class="form-group">
                <label for="">giá khuyến mãi</label>
                <input name="sale_price" class="form-control" placeholder="giá khuyến mãi.." value="<?php echo $value['sale_price']?>">
              </div>
              <div class="form-group">
                <label for="">Trạng thái</label>
                <div class="radio">
                 <label for="show">
                   <input type="radio" id="show" name="status" value="1" <?php echo $value['status']==1? 'checked' : ''; ?>> Hiện
                 </label>
                 <label for="hide">
                   <input type="radio" id="hide" name="status" value="0" <?php echo $value['status']==0? 'checked' : ''; ?>> Ẩn
                 </label>
               </div>
             </div>
             <div class="form-group">
              <label for="">Ảnh đại diện</label>
              <input type="hidden" name="image" value="" id="image">
              <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>chọn ảnh</a>
              <hr>
              <img src="" alt="" id="sow_img" style="width: 100%; height: auto">
            </div>
            <div class="form-group">
              <button name="addnew" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại</button>
            </div>   
          </form>

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
          <iframe src="http://localhost/do_an_rcq/file/dialog.php?field_id=image" style="width: 100%; height: 500px; border: none; overflow-y: auto "></iframe>
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


          <div class="modal fade" id="modal-list">
            <div class="modal-dialog" style="width: 90%">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                   <iframe src="http://localhost/do_an_rcq/file/dialog.php?field_id=image_list" style="width: 100%; height: 500px; border: none; overflow-y: auto "></iframe>
                </div>
              </div>
            </div>
          </div>
          <!-- <script type="text/javascript">
       
          
             $('#modal-list').on('hide.bs.modal',function(){
              var _imgg = $('input#image_list').val();
              var _lists = JSON.parse(_imgg);
                var _imgs = '';
              for (var i = 0; i < _lists.length; i++) {
                // console.log(_lists[i]);
                var _link ='../public/uploads/'+_lists[i];
                 _imgs += '<div class="col-md-4"><img src="'+_link+'" alt="" class="img-responsive"></div>';
               $('div#sow_image').html(_imgs);
              }
            })
          </script> -->
