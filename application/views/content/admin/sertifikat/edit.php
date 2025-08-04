<section class="section">
    <div class="card">
        <div class="card-body">
            <h3>Edit Sertifikat</h3>
            <form action="<?= base_url('sertifikat/edit/' . $sertifikat->id) ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" value="<?= set_value('nama', $sertifikat->nama) ?>" class="form-control" required>
                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label for="stambuk">Stambuk</label>
                    <input type="text" name="stambuk" value="<?= set_value('stambuk', $sertifikat->stambuk) ?>" class="form-control" required>
                    <?= form_error('stambuk', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label for="file_pdf">Ganti File PDF (kosongkan jika tidak diganti)</label>
                    <input type="file" name="file_pdf" class="form-control-file">
                    <p class="text-muted">File sekarang: <strong><?= $sertifikat->file_pdf ?></strong></p>
                    <?php if (!empty($upload_error)) : ?>
                        <div class="alert alert-danger"><?= $upload_error ?></div>
                    <?php endif; ?>

                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('sertifikat') ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</section>