<div class="modal-dialog">
    <form action="/pengguna_simpan" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <input type="hidden" name="id" value="<?= @$id; ?>">
                <div class="mb-3">
                    <label for="bidang" class="form-label">Bidang</label>
                    <select class="form-select" name="role_id">
                        <?php

                        foreach ($role as $v) :
                            if (!empty($id)) :
                                $sel = '';
                                if ($v['role_id'] == $role_id) :
                                    $sel = 'selected';
                                endif;
                            endif;
                            echo "<option value=" . $v['role_id'] . " " . @$sel . ">" . $v['nama_role'] . "</option>";
                        endforeach;
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="bidang" class="form-label">Username/Nama Pengguna</label>
                    <input type="text" value="<?= @$username; ?>" class="form-control" id="username" name="username" placeholder="Masukkan nama pengguna">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>