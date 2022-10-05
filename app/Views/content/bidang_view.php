<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header d-lg-flex justify-content-between align-items-center bg-secondary">
        <h4 class="text-warning display-7"><?= $title; ?></h4>
        <div class="tombol-group">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button id="btncari" type="button" class="btn btn-info" data-bs-toggle="collapse" href="#multiCollapseExample1"><i class="fas fa-search text-white"></i></button>
                <button type="button" class="btn btn-primary btn-modal" href="/bidang_form"><i class="fas fa-plus"></i> Input Data</button>
                <button type="button" class="btn btn-danger"><?= $rc; ?></button>
            </div>
        </div>
    </div>

    <!-- Area Pencarian Data -->
    <div class="col">
        <div class="collapse multi-collapse" id="multiCollapseExample1">
            <div class="card card-body">
                <form>
                    <div class="form-group">
                        <label for="prov">Bidang</label>
                        <input type="text" class="form-control" name="keyword" id="idpencarian" placeholder="Cari bidang">
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
                </tr>
            </thead>

            <tbody>
                <?php $no = 1 + (10 * ($page - 1)); ?>

                <?php
                foreach ($data as $v) : ?>
                    <tr>
                        <td style="width:50px"><?= $no++; ?></td>
                        <td style="width:30px"><a class="btn-modal" href="/bidang_edit/<?= $v['bidang_id']; ?>"><i class="fas fa-pencil-alt text-success"></i></a></td>
                        <td style="width:30px"><a class="swal" href="/bidang_hapus/<?= $v['bidang_id']; ?>"><i class="fas fa-trash-alt text-danger"></i></a></td>
                        <td><?= $v['bidang']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $pager->links('datagroup', 'bootstrap_pagination'); ?>

<?= $this->endSection(); ?>