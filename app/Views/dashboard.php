<div class="box-body" >
  <div class="alert alert-success alert-dismissible">
    <h4>Hi. Selamat datang, <?= session()->get('username') ?></h4>
  </div>
  <?php if(session()->get('level')==1){ ?>
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?= $countpas ?></h3>
          <p>Data Pasien</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="/pasien" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?= $countdok ?></h3>

          <p>Data Dokter</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
      <?php } ?>
    </div>
    
    <!-- ./col -->
    <div class="col-lg-3 col-xs-8">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <p>Pendaftaran Pasien</p>
          <i class="ion ion-person-add"></i>
        </div>  
        <a href="/pendaftaran" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?= $countpol ?></h3>

          <p>Data Poli</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="/poli" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
      
    <!-- ./col -->
  </div>
  