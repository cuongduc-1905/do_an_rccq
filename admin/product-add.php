                    <?php include 'header.php' ?>
                    <!-- =============================================== -->

                    <!-- Content Wrapper. Contains page content -->
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
                            // echo '<pre>';
                            //   // print_r($_FILES);
                            //   // print_r($_POST);
                            // echo '</pre>';
                            // $image = '';
                            // if (!empty($_FILES['image']['name'])) {
                            //   $file = $_FILES['image'];
                            //   $image = $file['name'];
                            //   $tmp_name = $file['tmp_name'];
                            //   move_uploaded_file($tmp_name, '../public/uploads/'.$image);
                            // }

                            // if (!empty($_FILES['image_list']['name'])) {
                            //   $fs = $_FILES['image_list'];

                            //   $image_list = '';
                            //   for ($i=0; $i < count($fs['name']) ; $i++) { 
                            //    $images = $file['name'][$i];
                            //    $tmp_names = $file['tmp_name'][$i];
                            //    $image_list = json_encode($fs['name']);
                            //    move_uploaded_file($tmp_names, '../public/uploads/'.$images);
                            //  }
                            //  echo  $image_list;

                           // }
                            if (!empty($_POST['name'])) {
                              $image = $_POST['image'];
                              $name = $_POST['name'];
                              $price = $_POST['price'];
                              $sale_price = $_POST['sale_price']; 
                              $category_id = $_POST['category_id']; 
                              $content = $_POST['content']; 

                              $status = $_POST['status'];

                              $sql = "INSERT INTO product(name,price,sale_price,status,image,category_id,content,image_list) VALUES('$name','$price','$sale_price','$status','$image','$category_id','$content','$image_list')";

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
                                      <input name="name" class="form-control" placeholder="Tên product" required="">
                                    </div>
                                    <div class="form-group">
                                      <label for="">Ảnh khác</label>
                                      <input type="file" name="image_list[]" class="form-control" multiple="">
                                    </div>
                                    <div class="form-group">
                                      <label for="">Nội dung</label>
                                      <textarea name="content" id="content" class="form-control" rows="3" ></textarea>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                   <div class="form-group">
                                    <?php 
                                    $sql_1 = "SELECT * FROM category order by id DESC";
                                    $cats = mysqli_query($conn,$sql_1);
                                    ?>
                                    <label for="">Danh mục sản phẩm</label>
                                    <select name="category_id" id="input" class="form-control" required>
                                      <option value="">chọn danh mục</option>}
                                      option
                                      <?php foreach ($cats as $key => $cat) :?>
                                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label for="">giá sản phẩm</label>
                                    <input name="price" class="form-control" placeholder="giá sản phẩm..">
                                  </div>
                                  <div class="form-group">
                                    <label for="">giá khuyến mãi</label>
                                    <input name="sale_price" class="form-control" placeholder="giá khuyến mãi..">
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
                                  <label for="">Ảnh đại diện</label>
                                  <input type="hidden" name="image" value="" id="image">
                                  <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>chọn ảnh</a>
                                  <hr>
                                  <img src="" alt="" id="show_image" class="img-responsive">
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
                          <iframe src="http://localhost/do_an_rcq/file/dialog.php?field_id=image" style="width: 100% ; border: none ; overflow-y: auto ; height:500px "></iframe>
                        </div>
                      </div>
                    </div>
                  </div>
 <!--                       <script type="text/javascript">
                        $('#modal-id').on('hide.bs.modal',function(){
                          var _img = $('input#image').val();
                          var _link_img ='../public/uploads/'+_img;
                          $('img#show_image').attr('src',_link_img);
                        })
                      </script>  -->
                       <script type="text/javascript">
                        $('#modal-id').on('hide.bs.modal',function(){
                          var _img = $('input#image').val();
                          var _link = '../public/uploads/'+_img;
                          $('img#show_image').attr('src',_link);
                        })
                      </script>




























