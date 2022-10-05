<div class="modal-dialog">
    <form action="/klasifikasi_simpan" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <input type="hidden" name="id" value="<?= @$id; ?>">
                <div class="mb-3">
                    <label for="kode" class="form-label">Kode Klasifikasi</label>
                    <input type="text" value="<?= @$kode_klasifikasi; ?>" class="form-control" id="kode_klasifikasi" name="kode_klasifikasi" placeholder="Masukkan kode klasifikasi">
                </div>
                <div class="mb-3">
                    <label for="kode" class="form-label">Klasifikasi</label>
                    <input type="text" value="<?= @$klasifikasi; ?>" class="form-control" id="klasifikasi" name="klasifikasi" placeholder="Masukkan klasifikasi dokumen">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>