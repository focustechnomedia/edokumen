<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<form action="/simpan_instansi/<?= $v['instansi_id']; ?>" method="post">
    <div class="card">
        <div class="card-header d-flex flex-row-reverse bd-highlight bg-secondary">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan Data</button>
                <!-- <button type="button" class="btn btn-secondary">Middle</button>
            <button type="button" class="btn btn-secondary">Right</button> -->
            </div>
        </div>

        <div class="card-body">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Instansi</label>
                <input type="text" class="form-control" id="instansi" name="instansi" value="<?= $v['instansi']; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Provinsi / Kabupaten / Kota</label>
                <input type="text" class="form-control" id="instansi" name="daerah" value="<?= $v['daerah']; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3"><?= $v['alamat']; ?></textarea>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>