<section class="section">
    <div class="card">
        <div class="card-body">
            <caption>
                <a class="btn btn-success" href="<?= base_url("sertifikat/add") ?>">+ Tambah Sertifikat</a>
            </caption>
            <table class="table table-striped caption-top" id="tabell">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Stambuk</td>
                        <td>File Sertifikat</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($sertifikat as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= ($row->nama) ?></td>
                            <td><?= ($row->stambuk) ?></td>
                            <td>
                                <a class="btn btn-info btn-sm" href="<?= base_url('uploads/pdf/' . $row->file_pdf) ?>" target="_blank">Lihat File</a>
                                <!-- <a href="<?php echo base_url('pdfviewer/show/dokumen.pdf'); ?>" target="_blank">Lihat PDF</a> -->

                            </td>
                            <td>
                                <?php if ($row->status == '1'): ?>
                                    <span class="btn btn-success btn-sm">Disetujui</span>
                                <?php elseif ($row->status == '2'): ?>
                                    <span class="btn btn-danger btn-sm">Ditolak</span>
                                <?php else: ?>
                                    <span class="btn btn-secondary btn-sm">Menunggu</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="#">Lihat</a>
                                <a href="<?= base_url('sertifikat/acc_view/' . $row->file_pdf) ?>">ACC</a>
                                <!-- <a href="<?= base_url('sertifikat/acc/' . $row->file_pdf) ?>">ACC</a> -->
                                <!-- <a class="btn btn-success btn-sm" href="<?= base_url('sertifikat/acc/' . $row->id) ?>">Acc</a> -->
                                <!-- <a class="btn btn-warning btn-sm" href="<?= base_url('sertifikat/edit/' . $row->id) ?>">Edit</a> -->
                                <a class="btn btn-danger btn-sm" href="<?= base_url('sertifikat/delete/' . $row->id) ?>" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<script>
    $(document).ready(function() {
        $('#tabell').DataTable();
    });
</script>