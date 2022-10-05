<div class="modal-dialog">
    <form action="/subbidang_simpan" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <input type="hidden" name="id" value="<?= @$id; ?>">
                <div class="mb-3">
                    <label for="bidang" class="form-label">Bidang</label>
                    <select class="form-select" name="bidang_id">
                        <?php

                        foreach ($dtbidang as $v) :
                            if (!empty($id)) :
                                $sel = '';
                                if ($v['bidang_id'] == $bidang_id) :
                                    $sel = 'selected';
                                endif;
                            endif;
                            echo "<option value=" . $v['bidang_id'] . " " . @$sel . ">" . $v['bidang'] . "</option>";
                        endforeach;
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="bidang" class="form-label">Sub Bidang</label>
                    <input type="text" value="<?= @$subbidang; ?>" class="form-control" id="subbidang" name="subbidang" placeholder="Masukkan Sub bidang">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>