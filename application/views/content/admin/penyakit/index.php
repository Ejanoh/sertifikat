<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table caption-top" id="penyakit">
                <caption>
                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modaladd">Tambah Hama & Penyakit</button>
                </caption>
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
                    <td>1</td>
                    <td>Eja</td>
                    <td>P21118082</td>
                    <td>FILE .PDF</td>
                    <td><a class="btn btn-success">Di Setujui</a></td>
                    <td>
                        <button class="btn btn-primary">Lihat</button>
                        <button class="btn btn-success">Acc</button>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                        <!-- <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#modaledit">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-outline-danger btn-sm" onclick="btnhapus('<?= $value->kodepenyakit ?>')">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button> -->
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- Modal Tambah Penyakit -->
<div class="modal fade" add="<?= $showModal == "add" ? "true" : "false" ?>" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="modaladdid" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaladdid">Tambah Hama & Penyakit</h5>
            </div>
            <form action="<?= base_url('penyakit') ?>/add" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="kodepenyakit">Kode Hama & Penyakit</label>
                            <input type="text" class="form-control" name="kodepenyakit" id="kodepenyakit" placeholder="Kode Hama & Penyakit" value="<?= set_value('kodepenyakit') ?>">
                            <?= form_error('kodepenyakit', '<div id="kodepenyakit" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="namapenyakit">Nama Hama & Penyakit</label>
                            <input type="text" class="form-control" name="namapenyakit" id="namapenyakit" placeholder="Nama Penyakit" value="<?= set_value('namapenyakit') ?>">
                            <?= form_error('namapenyakit', '<div id="namapenyakit" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="ketpenyakit">Keterangan Hama & Penyakit</label>
                            <input type="text" class="form-control" name="ketpenyakit" id="ketpenyakit" placeholder="Keterangan Penyakit" value="<?= set_value('ketpenyakit') ?>">
                            <?= form_error('ketpenyakit', '<div id="ketpenyakit" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Edit Penyakit -->
<div class="modal fade" edit="<?= $showModal == "edit" ? "true" : "false" ?>" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="modaleditid" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaleditid">Edit User</h5>
            </div>
            <form action="<?= base_url('penyakit') ?>/update" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="kodepenyakit">Kode Hama & Penyakit</label>
                            <input type="text" class="form-control" name="kodepenyakit" id="edkodepenyakit" value="<?= set_value('kodepenyakit') ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="namapenyakit">Nama Hama & Penyakit</label>
                            <input type="text" class="form-control" name="namapenyakit" id="ednamapenyakit" value="<?= set_value('namapenyakit') ?>">
                            <?= form_error('namapenyakit', '<div id="namapenyakit" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="ketpenyakit">Keterangan Hama & Penyakit</label>
                            <input type="text" class="form-control" name="ketpenyakit" id="edketpenyakit" value="<?= set_value('ketpenyakit') ?>">
                            <?= form_error('ketpenyakit', '<div id="ketpenyakit" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<script>
    $(document).ready(function() {
        $('#penyakit').DataTable();
    });

    // ajax get data penyakit for edit
    function updatepenyakit(id) {
        $.ajax({
            url: "<?= base_url('penyakit/getOne') ?>",
            type: "POST",
            data: {
                kode: id
            },
            dataType: "JSON",
            success: function(data) {
                $('#edkodepenyakit').val(data.kodepenyakit);
                $('#ednamapenyakit').val(data.namapenyakit);
                $('#edketpenyakit').val(data.ketpenyakit);
            }
        });
    }
</script>