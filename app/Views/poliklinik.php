
<section class="content">
    <div class="box">
        <div class="box-header d-flex justify-content-between align-items-center">
            <h3 class="box-title">Data Poliklinik</h3>
            <div class="box-header-button"><br>
                      
        <?php if (session()->has('success')) : ?>
          <div class="alert alert-success">
          <i class="fa fa-check-circle"> </i> <?= session('success') ?>
          </div>
        <?php endif ?>
                <a href="/tambahpoli" class="btn btn-primary" method="POST">Add new+</a>  <a href="/print" target="_blank" class="btn btn-danger">Print To Pdf</a><br>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="example2" class="table border-table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA POLI</th>
                        <th>NAMA DOKTER</th>
                        <th>GEDUNG</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($pol as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->nama_poli ?></td>
                        <td><?= $row->nama_dokter ?></td>
                        <td><?= $row->gedung ?></td>
                        <td>
                            <a href="<?= site_url('editpasien/'.$row->id_poli) ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0);" onclick="confirmDelete('<?= site_url('deletepasien/'.$row->id_poli) ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
        if (confirm("Apakah Anda yakin ingin menghapus data <?= $row->nama_poli ?>?")) {
            // Jika pengguna mengonfirmasi, redirect ke URL delete
            window.location = '<?= site_url('deletepasien/'.$row->id_poli) ?>';
        } else {
            // Jika pengguna membatalkan
            return false;
        }
    }
</script>


