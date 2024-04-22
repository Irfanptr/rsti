<section class="content">
    <div class="box">
        <div class="box-header d-flex justify-content-between align-items-center">
                <a href="/pasien" class="btn"><i class="fa fa-arrow-left"></i></a>
            <h3 class="box-title">Tambah Data Pasien</h3>
          </a>
        </div>
        <div class="box-body">
            <div class="card col-md-6">
        <form action="/tambahpasien" method="POST">
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
                <label>NAMA PASIEN</label>
                <input type="text" name="namapasien" class="form-control" />
            </div>
            <div class="form-group">
                <label>NIK</label>
                <input type="text" name="nik" class="form-control" />
            </div>
            <div class="form-group">
                <label>ALAMAT</label>
                <input type="text" name="alamat" class="form-control" />
            </div>
            <div class="form-group">
                <label>PEMBAYARAN</label>
                <select name="pembayaran" class="form-control">
                  <option value="" hidden>---</option>
                  <?php foreach ($byr as $key) : ?>
                    <option value="<?= $key->id_pembayaran ?>"><?= $key->metode ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>JENIS KELAMIN</label>
                <select name="jenis" class="form-control" />
                <option selected="" hidden>---</option>
                <option value="1">Pria</option>
                <option value="2">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>NO. HP</label>
                <input type="text" name="nohp" class="form-control" />
            </div>
            <div>
                <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Save</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </div>
        </div>
    </div>
</section>
