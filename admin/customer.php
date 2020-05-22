<?php include 'header.php' ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">regi...</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <?php $customer = mysqli_query($conn,"SELECT * FROM customer ORDER BY id DESC")?>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Name</th>
                  <th>email</th>
                  <th>phone</th>
                  <th>address</th>
                  <th>password</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($customer as $key => $kh) { ?>
                    <tr>
                      <td><?php echo $key+1 ?></td>
                      <td><?php echo $kh['name'] ?></td>
                      <td><?php echo $kh['email'] ?></td>
                      <td><?php echo $kh['phone'] ?></td>
                      <td><?php echo $kh['address'] ?></td>
                      <td><?php echo $kh['password'] ?></td>
                    </tr>
                <?php } ?>
              </tbody>
            </table>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php'; ?>