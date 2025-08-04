<section class="section">
    <div class="card">
        <div class="card-body">
            <h3>Tambah Sertifikat</h3>
            <form action="<?= base_url('sertifikat/add') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label for="stambuk">Stambuk</label>
                    <input type="text" name="stambuk" class="form-control" required>
                    <?= form_error('stambuk', '<small class="text-danger">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label for="file_pdf">File Sertifikat (PDF)</label>
                    <input type="file" name="file_pdf" class="form-control-file" required>
                    <small class="text-muted">Format: PDF, max 2MB</small>
                    <?= form_error('file_pdf', '<small class="text-danger">', '</small>') ?>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('sertifikat') ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</section>

<?php if ($this->session->flashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= $this->session->flashdata('success'); ?>',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
<?php endif; ?>

<?php if (!empty($upload_error)): ?>
    <div class="alert alert-danger mt-2"><?= $upload_error; ?></div>
<?php endif; ?>