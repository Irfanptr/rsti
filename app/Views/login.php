<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?= $title; ?> </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php base_url() ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php base_url() ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php base_url() ?>/template/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php base_url() ?>/template/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php base_url() ?>/template/plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page" style=" background-image: url('/image/background.jpeg');">
  <div class="login-box">

    <!-- /.login-logo -->
    <div class="login-box-body">


      <div class="login-logo">
        <img src="<?php base_url() ?>/image/rstugiblogo.png" height="50" weight="50">
      </div>
      <?php $error = session()->getFlashdata('error');
      if ($error) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $error ?>
        </div>
      <?php } ?>


      <?php $useremail = session()->getFlashdata('useremail');
      if ($useremail) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $useremail ?>
        </div>
      <?php } ?>

      <?php $password = session()->getFlashdata('password');
      if ($password) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $password ?>
        </div>
      <?php } ?>


      <i class="text-center">harap login terlebih dahulu</i>

      <form action="/" method="POST">
        <div class="form-group has-feedback">
          <input type="email" name="useremail" class="form-control" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-4">
          </div>
          <!-- /.col -->
          <div class="col-xs-4 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
      </form>
      <br>
      <a href="#">Lupa Password?</a><br>
      <span class="text-center">Belum mempunyai akun?<a href="/register">register</a></span>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="<?php base_url() ?>/template/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php base_url() ?>/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?php base_url() ?>/template/plugins/iCheck/icheck.min.js"></script>
</body>

</html>