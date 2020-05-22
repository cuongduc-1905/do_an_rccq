<?php 
  session_start();
  include  '../config/connect.php';
  if (!empty($_SESSION['admin_login'])) {
     header('location: index.php');
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href="public/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/font-awesome.min.css">
  <link rel="stylesheet" href="public/css/AdminLTE.css">
  <link rel="stylesheet" href="public/css/_all-skins.min.css">
  <link rel="stylesheet" href="public/css/jquery-ui.css">
  <link rel="stylesheet" href="public/css/style.css" />
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Đăng nhập để vào quản trị</p>
  <?php 
     $errors = [];
     if (isset($_POST['email'])) {
       $email = $_POST['email'];
       $pass = $_POST['password'];
       if ($email=='') {
         $errors['email'] = 'email không được để trống';
       }

        if ($pass =='') {
         $errors['password'] = 'mật khẩu không được để trống';
       }
       if (!$errors) {
         $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$pass' ";
       $query = mysqli_query($conn,$sql) or die($sql);
       if (mysqli_num_rows($query) == 1) {
         $admin = mysqli_fetch_assoc($query);
         $_SESSION['admin_login'] = $admin;
         header('location: index.php');
       }else{
        echo  'email hoăc mk không đúng';
       }  

       }

       

     }
   ?>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
     <?php if (!empty($errors['email'])) { ?>
        <div class="help-block text-danger" style="color: red">
            <?php echo $errors['email'] ?>
        </div>
     <?php } ?>
 
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <?php if (!empty($errors['password'])) { ?>
        <div class="help-block text-danger" style="color: red">
            <?php echo $errors['password'] ?>
        </div>
     <?php } ?>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
