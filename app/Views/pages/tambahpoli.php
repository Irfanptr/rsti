<section class="content">
    <div class="box">
        <div class="box-header d-flex justify-content-between align-items-center">
                <a href="/poli" class="btn"><i class="fa fa-arrow-left"></i></a>
            <h3 class="box-title">Tambah Data Pasien</h3>
          </a>
        </div>
        <div class="box-body">
            <div class="card col-md-6">
        <form action="/tambahpoli" method="POST">
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
                <label>NAMA POLI</label>
                <select name="namapoli" class="form-control">
                  <option value="" hidden>---</option>
                  <?php foreach ($pol as $key) : ?>
                    <option value="<?= $key->id_poli ?>"><?= $key->nama_poli ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>NAMA DOKTER</label>
                <select name="namadokter" class="form-control">
                  <option value="" hidden>---</option>
                  <?php foreach ($pol as $key) : ?>
                    <option value="<?= $key->id_dokter ?>"><?= $key->nama_dokter ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>GEDUNG</label>
                <input type="text" name="gedung" class="form-control" />
            </div>
            <div>
                <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </div>
        </div>
    </div>
</section>
