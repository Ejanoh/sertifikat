<div class="row justify-content-center">
    <div class="col-lg-12 col-md-7">
        <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                    <h2 class="text-white">Registrasi</h2>
                </div>
                <form role="form" action="<?= base_url('petani/regist'); ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <div class="input-group input-group-alternative">
                                    <input class="form-control" placeholder="Nama Lengkap" name="namapetani" type="text" value="<?= set_value('namapetani') ?>">
                                </div>
                                <?= form_error('namapetani', '<div id="namapetani" class="form-text text-danger text-left">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <input class="form-control" placeholder="Nomor Hp" name="nohp" type="text" value="<?= set_value('nohp') ?>">
                                </div>
                                <?= form_error('nohp', '<div id="nohp" class="form-text text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <label>User Account</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <div class="input-group input-group-alternative">
                                    <input class="form-control" placeholder="Username" name="username" type="text" value="<?= set_value('username') ?>">
                                </div>
                                <?= form_error('username', '<div id="username" class="form-text text-danger">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="<?= set_value('password') ?>">
                                </div>
                                <?= form_error('password', '<div id="password" class="form-text text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4">Registrasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>