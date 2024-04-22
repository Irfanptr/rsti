
<section class="content">
    <div class="box">
        <div class="box-header d-flex justify-content-between align-items-center">
            <h3 class="box-title">Data Pasien</h3>
            <div class="box-header-button"><br>
                      
        <?php if (session()->has('success')) : ?>
          <div class="alert alert-success">
          <i class="fa fa-check-circle"> </i> <?= session('success') ?>
          </div>
        <?php endif ?>
                <a href="/add" class="btn btn-primary" method="POST">Add new+</a>  <a href="/print" target="_blank" class="btn btn-danger">Print To Pdf</a><br>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="example2" class="table border-table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA PASIEN</th>
                        <th>NIK</th>
                        <th>JENIS KELAMIN</th>
                        <th>ALAMAT</th>
                        <th>PEMBAYARAN</th>
                        <th>NO. HP</th>
                        <th>TANGGAL BEROBAT</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($pasien as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->nama_pasien ?></td>
                        <td><?= $row->nik ?></td>
                        <td><?= $row->jenis_kelamin ?></td>
                        <td><?= $row->alamat ?></td>
                        <td><?= $row->metode ?></td>
                        <td><?= $row->nohp ?></td>
                        <td><?= date('d/m/Y', strtotime($row->tgl_berobat)) ?></td>
                        <td>
                            <a href="<?= site_url('editpasien/'.$row->pasienid) ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0);" onclick="confirmDelete('<?= site_url('deletepasien/'.$row->pasienid) ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script>
    function confirmDelete(url) {
        if (confirm("Apakah Anda yakin ingin menghapus data <?= $row->nama_pasien ?>?")) {
            // Jika pengguna mengonfirmasi, redirect ke URL delete
            window.location = '<?= site_url('deletepasien/'.$row->pasienid) ?>';
        } else {
            // Jika pengguna membatalkan
            return false;
        }
    }
</script>


