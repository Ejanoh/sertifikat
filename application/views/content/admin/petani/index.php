<section class="section">
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
            <?php if ($this->session->userdata('role') == 1) { ?>
                <div style="text-align: right;">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladd">Tambah Data</button>
                </div>
                <br>
            <?php } elseif ($this->session->userdata('role') == 2) { ?>

            <?php } ?>
            <table class="table" id="penduduk">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>NIK</td>
                        <td>Nama</td>
                        <td>Jenis Kelamin</td>
                        <td>Dosis 1</td>
                        <td>Dosis 2</td>
                        <td>Dosis 3</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($penduduk as $a) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><span nik="<?= $a->nik; ?>" nama="<?= $a->nama; ?>" ttl="<?= $a->ttl; ?>" jk="<?= $a->jk; ?>" alamat="<?= $a->alamat; ?>" agama="<?= $a->agama; ?>" sd1="<?= $a->sd1; ?>" sd2="<?= $a->sd2; ?>" sd3="<?= $a->sd3; ?>" latitude="<?= $a->latitude; ?>" longitude="<?= $a->longitude; ?>" class="badge bg-light-primary detailclick" data-bs-toggle="modal" data-bs-target="#detail"><?= $a->nik; ?></span></td>
                            <td><?= $a->nama; ?></td>
                            <td>
                                <?php if ($a->jk == 1) {
                                    echo 'Laki - Laki';
                                } else {
                                    echo 'Perempuan';
                                } ?>
                            </td>
                            <td>
                                <?php if ($a->sd1 == 1) { ?>
                                    ✔️
                                <?php } else if ($a->sd1 == 0) { ?>
                                    ❌
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($a->sd2 == 1) { ?>
                                    ✔️
                                <?php } else if ($a->sd2 == 0) { ?>
                                    ❌
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($a->sd3 == 1) { ?>
                                    ✔️
                                <?php } else if ($a->sd3 == 0) { ?>
                                    ❌
                                <?php } ?>
                            </td>
                            <td>
                                <button id="<?= $a->id; ?>" nik="<?= $a->nik; ?>" nama="<?= $a->nama; ?>" ttl="<?= $a->ttl; ?>" jk="<?= $a->jk; ?>" alamat="<?= $a->alamat; ?>" agama="<?= $a->agama; ?>" sd1="<?= $a->sd1; ?>" sd2="<?= $a->sd2; ?>" sd3="<?= $a->sd3; ?>" class="btn icon btn-primary editdatapend" type="button" data-bs-toggle="modal" data-bs-target="#editdata"><i class="bi bi-pencil-square"></i></button>
                                <button id="<?= $a->id; ?>" nik="<?= $a->nik; ?>" nama="<?= $a->nama; ?>" class="btn icon btn-danger hapusdatapen" type="button" data-bs-toggle="modal" data-bs-target="#hapusdata"><i class="bi bi-trash3-fill"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- Modal Add -->
<div class="modal fade text-left" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Data Penduduk</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('penduduk') ?>/add" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik">Nomor Induk Kependudukan</label>
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="Nomor Induk Kependudukan" oninvalid="this.setCustomValidity('NIK Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tmpt">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tmpt" id="tmpt" placeholder="Tempat Lahir" oninvalid="this.setCustomValidity('Tempat Lahir Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tgl">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl" id="tgl" oninvalid="this.setCustomValidity('Tanggal Lahir Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jk">Pilih Jenis Kelamin</label>
                                <select class="form-control" id="jk" name="jk" oninvalid="this.setCustomValidity('Jenis Kelamin Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                    <option value="">Select Gender</option>
                                    <option value="1">Laki - Laki</option>
                                    <option value="0">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" oninvalid="this.setCustomValidity('Alamat Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="agama">Pilih Agama</label>
                                <select class="form-control" id="agama" name="agama" oninvalid="this.setCustomValidity('Agama Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                    <option value="">Select Agama</option>
                                    <option value="1">Islam</option>
                                    <option value="2">Kristen</option>
                                    <option value="3">Hindu</option>
                                    <option value="4">Budha</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <p>Status Vaksin</p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Dosis Pertama</label>
                                <select class="form-control" id="st1" name="st1" oninvalid="this.setCustomValidity('Dosis Pertama Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Sudah</option>
                                    <option value="0">Belum</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Dosis Kedua</label>
                                <select class="form-control" id="st2" name="st2" oninvalid="this.setCustomValidity('Dosis Kedua Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Sudah</option>
                                    <option value="0">Belum</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Dosis Ketiga</label>
                                <select class="form-control" id="st3" name="st3" oninvalid="this.setCustomValidity('Dosis Ketiga Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Sudah</option>
                                    <option value="0">Belum</option>
                                </select>
                            </div>
                        </div>
                    </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                            <label for="">Lokasi</label><br>
                            <button type="button" id="manualtikor" class="btn btn-sm btn-primary">Manual</button>
                            <button type="button" id="autotikor" class="btn btn-sm btn-primary">Otomatis</button>
                            <div class="row mt-2" id="locahide">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lat" id="lat" placeholder="Ex : -0.8363825874697268">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="long" id="long" placeholder="Ex : 119.89364057321774">
                                </div>
                                <div class="container">
                                    <div class="mt-2 container" id="mapid" style="width: 100%; height: 450px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Edit -->
<div class="modal fade text-left" id="editdata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title detailnamepen" id="myModalLabel33">Tambah Data Penduduk</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('penduduk') ?>/update" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik">Nomor Induk Kependudukan</label>
                                <input type="text" class="form-control" name="nik" id="ednik" placeholder="Nomor Induk Kependudukan" oninvalid="this.setCustomValidity('NIK Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                <input type="text" class="form-control" name="id" id="edid" hidden>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="ednama" placeholder="Nama Lengkap" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tmpt">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tmpt" id="edtmpt" placeholder="Tempat Lahir" oninvalid="this.setCustomValidity('Tempat Lahir Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tgl">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl" id="edtgl" oninvalid="this.setCustomValidity('Tanggal Lahir Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jk">Pilih Jenis Kelamin</label>
                                <select class="form-control" id="edjk" name="jk" oninvalid="this.setCustomValidity('Jenis Kelamin Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                    <option value="">Select Gender</option>
                                    <option value="1">Laki - Laki</option>
                                    <option value="0">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="edalamat" placeholder="Alamat" oninvalid="this.setCustomValidity('Alamat Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="agama">Pilih Agama</label>
                                <select class="form-control" id="edagama" name="agama" oninvalid="this.setCustomValidity('Agama Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                    <option value="">Select Agama</option>
                                    <option value="1">Islam</option>
                                    <option value="2">Kristen</option>
                                    <option value="3">Hindu</option>
                                    <option value="4">Budha</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <p>Status Vaksin</p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Dosis Pertama</label>
                                <select class="form-control" id="edst1" name="st1" oninvalid="this.setCustomValidity('Dosis Pertama Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Sudah</option>
                                    <option value="0">Belum</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Dosis Kedua</label>
                                <select class="form-control" id="edst2" name="st2" oninvalid="this.setCustomValidity('Dosis Kedua Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Sudah</option>
                                    <option value="0">Belum</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Dosis Ketiga</label>
                                <select class="form-control" id="edst3" name="st3" oninvalid="this.setCustomValidity('Dosis Ketiga Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Sudah</option>
                                    <option value="0">Belum</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row mb-2">
                        <div class="col-md-12">
                            <label for="">Lokasi</label><br>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lat" id="edlat" placeholder="Ex : -0.8363825874697268">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="long" id="edlong" placeholder="Ex : 119.89364057321774">
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- End Modal -->

<!-- Modal Hapus -->
<div class="modal fade text-left" id="hapusdata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title hapusname" id="myModalLabel33"></h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('penduduk') ?>/delete" method="POST">
                <div class="modal-body">
                    Hapus Data Penduduk NIK <b id="hnik"></b> ?
                    <input type="text" class="form-control" name="id" id="hid" hidden>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Detail -->
<div class="modal fade text-left" id="detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title detailname" id="myModalLabel33"></h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">NIK</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="dnik"></div>
                </div>
                <div class="row">
                    <div class="col-md-5">Nama</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="dnama"></div>
                </div>
                <div class="row">
                    <div class="col-md-5">Tempat, Tanggal Lahir</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="dttl"></div>
                </div>
                <div class="row">
                    <div class="col-md-5">Jenis Kelamin</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="djk"></div>
                </div>
                <div class="row">
                    <div class="col-md-5">Alamat</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="dalamat"></div>
                </div>
                <div class="row">
                    <div class="col-md-5">Agama</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="dagama"></div>
                </div>
                <hr>
                <label>Status Vaksin</label>
                <div class="row">
                    <div class="col-md-5">Dosis Pertama</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="dsd1"></div>
                </div>
                <div class="row">
                    <div class="col-md-5">Dosis Kedua</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="dsd2"></div>
                </div>
                <div class="row">
                    <div class="col-md-5">Dosis Ketiga</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="dsd3"></div>
                </div>
                <hr>
                <label>Lokasi</label>
                <div class="row">
                    <div class="col-md-5">Latitude</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="dlatitude"></div>
                </div>
                <div class="row">
                    <div class="col-md-5">Longitude</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-6" id="dlongitude"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<script>
    var mymap = L.map("mapid").setView([-0.8362023, 119.8839144], 12);

    L.tileLayer(
        "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: "mapbox/streets-v11",
            tileSize: 512,
            zoomOffset: -1,
        }
    ).addTo(mymap);

    mymap.on('click', function(e) {
        var latlng = mymap.mouseEventToLatLng(e.originalEvent);
        $('#lat').val(latlng.lat);
        $('#long').val(latlng.lng);
    });

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            swal.fire('Upsss!', 'Lokasi tidak diaktifkan', 'error');
        }
    }

    function showPosition(position) {
        $('#lat').val(position.coords.latitude);
        $('#long').val(position.coords.longitude);
    }

    $(document).ready(function() {
        $('#penduduk').DataTable();
        $('#locahide').hide();

    });

    $('#autotikor').click(function() {
        $('#locahide').show();
        $('#mapid').hide();
        getLocation();
        
    });
    
    $('#manualtikor').click(function() {
        $('#locahide').show();
        $('#mapid').show();
    });

    // Js Edit Daata
    $('.editdatapend').click(function() {
        // Tangkap data
        var id = $(this).attr('id');
        var nik = $(this).attr('nik');
        var nama = $(this).attr('nama');
        var ttl = $(this).attr('ttl');
        var jk = $(this).attr('jk');
        var alamat = $(this).attr('alamat');
        var agama = $(this).attr('agama');
        var sd1 = $(this).attr('sd1');
        var sd2 = $(this).attr('sd2');
        var sd3 = $(this).attr('sd3');
        // var latitude = $(this).attr('latitude');
        // var longitude = $(this).attr('longitude');

        // Lempar Data
        $('.detailnamepen').text('Ubah Data ' + nama);
        $('#edid').val(id);
        $('#ednik').val(nik);
        $('#ednama').val(nama);
        var ttl = ttl.split(", ");
        $('#edtmpt').val(ttl[0]);
        $('#edtgl').val(ttl[1]);
        $('#edjk').val(jk);
        $('#edalamat').val(alamat);
        $('#edagama').val(agama);
        $('#edst1').val(sd1);
        $('#edst2').val(sd2);
        $('#edst3').val(sd3);
        // $('#edlat').val(latitude);
        // $('#edlong').val(longitude);
    });

    // Js Hapus Data
    $('.hapusdatapen').click(function() {
        // Tangkap data
        var id = $(this).attr('id');
        var nik = $(this).attr('nik');
        var nama = $(this).attr('nama');

        // Lempar Data
        $('.hapusname').text('Hapus Data ' + nama);
        $('#hnik').text(nik);
        $('#hid').val(id);
    });

    // Js Detail Data
    $('.detailclick').click(function() {
        // Tangkap data
        // var id = $(this).attr('id');
        var nik = $(this).attr('nik');
        var nama = $(this).attr('nama');
        var ttl = $(this).attr('ttl');
        var jk = $(this).attr('jk');
        var alamat = $(this).attr('alamat');
        var agama = $(this).attr('agama');
        var sd1 = $(this).attr('sd1');
        var sd2 = $(this).attr('sd2');
        var sd3 = $(this).attr('sd3');
        var latitude = $(this).attr('latitude');
        var longitude = $(this).attr('longitude');
        // Lempar Data
        $('.detailname').text('Detail ' + nama);
        $('#dnik').text(nik);
        $('#dnama').text(nama);
        $('#dttl').text(ttl);
        if (jk == 1) {
            $('#djk').text('Laki - Laki');
        } else if (jk == 0) {
            $('#djk').text('Perempuan');
        }
        $('#dalamat').text(alamat);
        if (agama == 1) {
            $('#dagama').text('Islam');
        } else if (agama == 2) {
            $('#dagama').text('Kristen');
        } else if (agama == 3) {
            $('#dagama').text('Hindu');
        } else if (agama == 2) {
            $('#dagama').text('Budha');
        }
        if (sd1 == 1) {
            $('#dsd1').text('Sudah');
        } else if (sd1 == 0) {
            $('#dsd1').text('Belum');
        }
        if (sd2 == 1) {
            $('#dsd2').text('Sudah');
        } else if (sd2 == 0) {
            $('#dsd2').text('Belum');
        }
        if (sd3 == 1) {
            $('#dsd3').text('Sudah');
        } else if (sd3 == 0) {
            $('#dsd3').text('Belum');
        }
        $('#dlatitude').text(latitude);
        $('#dlongitude').text(longitude);
    });
</script>