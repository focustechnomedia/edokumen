<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header d-lg-flex justify-content-between align-items-center bg-secondary">
        <h4 class="text-warning display-7"><?= $title; ?></h4>
        <div class="tombol-group">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button id="btncari" type="button" class="btn btn-info" data-bs-toggle="collapse" href="#multiCollapseExample1"><i class="fas fa-search text-white"></i></button>
                <a href="/dokumen" class="btn btn-primary"><i class="fas fa-plus"></i> Input Data</a>
                <button type="button" class="btn btn-danger"><?= $rc; ?></button>
            </div>
        </div>
    </div>

    <!-- Area Pencarian Data -->
    <div class="col">
        <div class="collapse multi-collapse" id="multiCollapseExample1">
            <div class="card card-body">
                <form method="get">
                    <div class="form-group">
                        <label for="prov">Cari Dokumen</label>
                        <input type="text" class="form-control" name="key" id="idpencarian" placeholder="Ketik kata kunci disini">
                    </div>

                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-info"><i class="fas fa-search"></i> Cari</button>
                        <button type="submit" class="btn btn-warning"><i class="fas fa-undo"></i> Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- EOF Area Pencarian Data -->

    <div class="card-body">
        <table class="table table-sm table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th colspan="2">Aksi</th>
                    <th>Bidang</th>
                    <th>Sub Bidang</th>
                    <th>Kode - Klasifikasi Dokumen</th>
                    <th>Nama Dokumen</th>
                    <th>Lihat Dokumen</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1 + (10 * ($page - 1)); ?>

                <?php
                foreach ($data as $v) : ?>
                    <tr>
                        <td style="width:50px"><?= $no++; ?></td>
                        <td style="width:30px"><a href="/dokumen_form/<?= $v['dokumen_id']; ?>"><i class="fas fa-pencil-alt text-success"></i></a></td>
                        <td style="width:30px"><a class="swal" href="/dokumen_hapus/<?= $v['dokumen_id']; ?>"><i class="fas fa-trash-alt text-danger"></i></a></td>
                        <td><?= $v['bidang']; ?></td>
                        <td><?= $v['subbidang']; ?></td>
                        <td><?= $v['kode_klasifikasi'] . " - " . $v['klasifikasi']; ?></td>
                        <td><?= $v['nama_dokumen']; ?></td>
                        <td class="text-center"><a href="showfile/<?= $v['nama_file']; ?>" target="_blank"><i class="fas fa-file-alt fa-2x"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $pager->links('datagroup', 'bootstrap_pagination'); ?>

<?= $this->endSection(); ?>