<?php include 'header.php' ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <?php 
            $id = $_GET['id'];
            $sql = "DELETE FROM category WHERE id = $id";

            if (mysqli_query($conn,$sql)) {
              header('location: category.php');
            }else{
               echo '<script type="text/javascript"> 
               alert("không thể xóa danh mục khi trong danh mục tồn tại sản phẩm !");
               window.location.href = "http://localhost/do_an_rcq/admin/category.php";
               </script>';
            }
           ?>
        </div>
        <!-- /.box-body -->
       
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php'; ?>