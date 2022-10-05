<div class="modal-dialog">
    <form action="/role_simpan" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <input type="hidden" name="id" value="<?= @$id; ?>">
                <div class="mb-3">
                    <label for="bidang" class="form-label">Nama Role</label>
                    <input type="text" value="<?= @$nama_role; ?>" class="form-control" id="nama_role" name="nama_role" placeholder="Masukkan Nama Role">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>