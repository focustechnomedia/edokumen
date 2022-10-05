<div class="modal-dialog">
    <form action="/bidang_simpan" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Master Bidang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <input type="hidden" name="id" value="<?= @$id; ?>">
                <div class="mb-3">
                    <label for="bidang" class="form-label">Bidang</label>
                    <input type="text" value="<?= @$bidang; ?>" class="form-control" id="bidang" name="bidang" placeholder="Masukkan data bidang">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>