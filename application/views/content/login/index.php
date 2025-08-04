<div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                    <h2 class="text-white">Log In</h2>
                </div>
                <form role="form" action="<?= base_url('login/prosses'); ?>" method="post">
                    <div class="form-group mb-4">
                        <div class="input-group input-group-alternative">
                            <input class="form-control" placeholder="Username" name="username" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <input class="form-control" placeholder="Password" name="password" type="password">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <a href="<?= base_url('login/regist') ?>" class="text-light"><small>Create new account</small></a>
            </div>
        </div>
    </div>
</div>