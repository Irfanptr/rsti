<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header" >
      <!-- Logo -->
      <a class="logo">
        <!-- logo for regular state and mobile devices -->
        <img src="<?php base_url() ?>/image/rslogo1.png" height="45" weight="45">
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
           
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php base_url() ?>/image/user2m.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= session()->get('username')  ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php base_url('image/'.session()->get('foto')) ?>" class="img-circle" alt="User Image">
                  <p>
                    <?= session()->get('username')  ?> -  <?= session()->get('useremail')  ?><br>
                    <?php if(session()->get('level')==1){
                      echo 'admin';
                    } else if(session()->get('level')==2){
                      echo 'pasien';
                    } else {
                      echo 'pasien';
                    }?>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url('/auth/logout') ?>" class="btn btn-default btn-flat">Logout</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
