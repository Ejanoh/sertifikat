<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table caption-top table-hover table-responsive" id="penyakit">
                    <caption>
                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modaladd">Tambah Gejala</button>
                    </caption>
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Kode Gejala</td>
                            <td>Nama Gejala</td>
                            <td>Nama Hama & Penyakit</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($gejala as $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->kodegejala ?></td>
                                <td><?= $value->namagejala ?></td>
                                <td><?= $value->kodepenyakit . ' | ' . $value->namapenyakit ?></td>
                                <td>
                                    <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" onclick="updatepenyakit('<?= $value->kodegejala ?>')" data-bs-target="#modaledit">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm" onclick="btnhapus('<?= $value->kodegejala ?>')">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>

<!-- Modal Tambah Penyakit -->
<div class="modal fade" add="<?= $showModal == "add" ? "true" : "false" ?>" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="modaladdid" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaladdid">Tambah Gejala</h5>
            </div>
            <form action="<?= base_url('gejala') ?>/add" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="kodegejala">Kode Gejala</label>
                            <input type="text" class="form-control" name="kodegejala" id="kodegejala" placeholder="Kode Gejala" value="<?= set_value('kodegejala') ?>">
                            <?= form_error('kodegejala', '<div id="kodegejala" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="namagejala">Nama Gejala</label>
                            <input type="text" class="form-control" name="namagejala" id="namagejala" placeholder="Nama Gejala" value="<?= set_value('namagejala') ?>">
                            <?= form_error('namagejala', '<div id="namagejala" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="ketgejala">Keterangan Gejala</label>
                            <input type="text" class="form-control" name="ketgejala" id="ketgejala" placeholder="Keterangan Gejala" value="<?= set_value('ketgejala') ?>">
                            <?= form_error('ketgejala', '<div id="ketgejala" class="form-text text-danger text-left">', '</div>'); ?>
                        </div>
                        <div class="form-grup">
                            <label for="kodepenyakit">Hama & Penyakit</label>
                            <select class="form-select">
                                <option value="">Pilih Hama & Penyakit</option>
                                <?php foreach ($penyakit as $value) { ?>
                                    <option value="<?= $value->kodepenyakit; ?>"><?= $value->kodepenyakit.' | '.$value->namapenyakit; ?></option>
                                <?php } ?>
                            </select>
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