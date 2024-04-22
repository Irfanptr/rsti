<aside class="main-sidebar" >
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php base_url() ?>/image/user2m.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= session()->get('username')  ?><br>
          <a href=""><?php if(session()->get('level')==1){
                      echo 'admin';
                    } else if(session()->get('level')==2){
                      echo 'pasien';
                    } else {
                      echo 'pasien';
                    }?></a>
        </p>
        
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      <?php if (session()->get('level') == 1 || session()->get('level') == 3) { ?>
        <li class="">
          <a href="<?= base_url('/dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="header">MASTER DATA</li>
        <li>
          <a href="/pendaftaran">
            <i class="fa fa-th"></i> <span>Pendaftaran Pasien</span>
          </a>
        </li>
        <li>
          <a href="/poli">
            <i class="fa fa-files-o"></i>
            <span>Data Poli</span>

            </span>
          </a>
        </li>
        <?php } ?>
        <?php if(session()->get('level')==1){ ?>
        <li>
          <a href="/dokter">
            <i class="fa fa-th"></i> <span>Data Dokter</span>
          </a>
        </li>
        <li>
          <a href="/pasien">
            <i class="fa fa-th"></i> <span>Data Pasien</span>
          </a>
        </li>
        <li>
          <a href="/rm">
            <i class="fa fa-th"></i> <span>Data Rekam Medis</span>
          </a>
        </li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>
    <section class="content">
        