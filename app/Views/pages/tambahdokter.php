<section class="content">
    <div class="box">
        <div class="box-header d-flex justify-content-between align-items-center">
                <a href="/dokter" class="btn"><i class="fa fa-arrow-left"></i></a>
            <h3 class="box-title">Tambah Data Pasien</h3>
          </a>
        </div>
        <div class="box-body">
            <div class="card col-md-6">
        <form action="/tambahdokter" method="POST">
        <?php if (session()->has('errors')) : ?>
          <div class="alert alert-danger">
            <ul>
              <?php foreach (session('errors') as $error) : ?>
                <li><?= esc($error) ?></li>
              <?php endforeach ?>
            </ul>
          </div>
        <?php endif ?>
            <div class="form-group">
                <label>NAMA DOKTER</label>
                <input type="text" name="namadokter" class="form-control" />
            </div>
            <div class="form-group">
                <label>ALAMAT</label>
                <input type="text" name="alamat" class="form-control" />
            </div>
            <div class="form-group">
                <label>NO. HP</label>
                <input type="text" name="nohp" class="form-control" />
            </div>
            <div class="form-group">
                <label>SPESIALIS</label>
                <input type="text" name="spesialis" class="form-control" />
            </div>
            <div>
                <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </div>
        </div>
    </div>
</section>
