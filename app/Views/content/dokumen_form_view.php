<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="card">
        <div class="card-header bg-secondary">
            <?= $title; ?>
        </div>
        <div class="card-body">

            <form action="/dokumen_save" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="bidang" class="form-label">Bidang</label>
                            <?= form_dropdown('bidang_id', $bidang, old('bidang_id'), 'class="form-select"'); ?>
                        </div>

                        <div class="mb-3">
                            <label for="subbidang" class="form-label">Sub Bidang</label>
                            <?= form_dropdown('subbidang_id', $subbidang, old('subbidang_id'), 'class="form-select"'); ?>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Klasifikasi</label>
                            <?= form_dropdown('klasifikasi_id', $klasifikasi, old('klasifikasi_id'), 'class="form-select"'); ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="nama_dokumen" class="form-label">Nama Dokumen</label>
                            <input type="text" class="form-control <?= ($validation->hasError('nama_dokumen') ? 'is-invalid' : ''); ?>" id="nama_dokumen" name="nama_dokumen" value="<?= old('nama_dokumen'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_dokumen'); ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Dokumen (PDF/JPG)</label>
                            <input class="form-control <?= ($validation->hasError('nama_file') ? 'is-invalid' : ''); ?>" type="file" id="nama_file" name="nama_file">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_file'); ?>
                            </div>
                        </div>

                        <div class="row">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>