<style>
    .box-body .form-group label {
        font-size: 15px;
    }

    .box-body .form-group select {
        font-size: 13px;
        height: 30px;
    }

    .box-body .form-group input {
        height: 35px;
    }
</style>

<section class="content">
    <div class="col-lg-4">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Pilih Poliklinik</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-7" style="margin-left: 25px;">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Nama Poli</label>
                                <select name="namapoli" id="namapoli" class="form-control">
                                    <option value="" hidden>---</option>
                                    <?php foreach ($pol as $key) : ?>
                                        <option value="<?= $key->id_poli ?>"><?= $key->nama_poli ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Dokter</label>
                                <input type="text" name="namadokter" id="namadokter" class="form-control" disabled />
                            </div>
                            <div class="form-group">
                                <label>Spesialis</label>
                                <input type="text" name="spesialis" id="spesialis" class="form-control" disabled />
                            </div>
                            <div class="form-group">
                                <label>Gedung</label>
                                <input type="text" name="gedung" id="gedung" class="form-control" disabled />
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Input Data Pasien</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-4" style="margin-left: 25px;">
                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" name="nohp" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="nohp" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Pembayaran</label>
                        <select name="pembayaran" class="form-control">
                            <option value="" hidden>---</option>
                            <?php foreach ($pm as $key) : ?>
                                <option value="<?= $key->id_pembayaran ?>"><?= $key->metode ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>No Telfon</label>
                        <input type="text" name="nohp" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6" style="margin-left: 25px;">
                    <div class="form-group">
                        <label>JENIS KELAMIN</label>
                        <select name="jenis" class="form-control" />
                        <option selected="" hidden>---</option>
                        <option value="1">Pria</option>
                        <option value="2">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nohp" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Keluhan</label>
                        <input type="text" name="nohp" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>No Telfon</label>
                        <input type="text" name="nohp" class="form-control" />
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-default">
            <div class="box-header with-border">
                <a href="#" class="btn btn-primary" style="margin-left: 580px;"><i class="fa fa-arrow-right"></i> Simpan Dan Lanjutkan</a>
            </div>
        </div>
        </form>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#namapoli').change(function() {
            var namapoli = $(this).val(); // Ambil nilai dari select #namapoli
            $.ajax({
                url: "/autofill", // URL endpoint dari controller
                method: 'POST',
                data: {
                    id: namapoli
                },
                success: function(response) {
                    $('#namadokter').val(response.nama_dokter);
                    $('#spesialis').val(response.spesialis);
                    $('#gedung').val(response.gedung);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                    console.log(xhr.responseText); // Tampilkan pesan respons dari server
                }
            });
        });
    });
</script>