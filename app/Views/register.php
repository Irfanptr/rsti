<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page" style=" background-image: url('/image/background.jpeg');">
  <div class="register-box">
    <div class="register-logo">

    </div>
    <div class="register-box-body">
      <p class="login-box-msg"><img src="<?php base_url() ?>/image/rstugiblogo.png" height="50" weight="50"></p>

      <form action="<?= base_url('create') ?>" method="post">
        <?php if (session()->has('errors')) : ?>
          <div class="alert alert-danger">
            <ul>
              <?php foreach (session('errors') as $error) : ?>
                <li><?= esc($error) ?></li>
              <?php endforeach ?>
            </ul>
          </div>
        <?php endif ?>

        <?php if (session()->has('success')) : ?>
          <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> <?= session('success') ?>
          </div>
        <?php endif ?>


        <div class="form-group has-feedback">
          <input type="text" name="username" id="username" class="form-control" placeholder="Username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="email" name="email" id="email" class="form-control" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="password" name="confirmpass" id="confirmpass" class="form-control" placeholder="Confirm Password">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>

        <div class="row">
          <div class="col-xs-4">
          </div>
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <br>
      <span class="text-center">Sudah Mempunyai Akun?<a href="/">Kembali Ke Login.</span></a>
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery 3 -->
  <script src="<?php base_url() ?>/template/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php base_url() ?>/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?php base_url() ?>/template/plugins/iCheck/icheck.min.js"></script>
</body>

</html>