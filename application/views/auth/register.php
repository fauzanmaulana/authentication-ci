<div class="row m-0">
    <div class="col-lg-6">
        <img src="<?= base_url('assets/images/hero-motio.gif') ?>" width="650" alt="lelang">
    </div>
    <div class="col-lg-6 d-flex align-items-center">
        <div class="container px-5">
            <h2 class="text-center">Register</h2>
            <form action="<?= site_url('main/register') ?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="InputUsername" placeholder="username" name="username" value="<?= set_value('username') ?>">
                    <small class='text-danger'><?= form_error('username') ?></small>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="email" name="email" value="<?= set_value('email') ?>">
                    <?= form_error("email", "<small class='text-danger'>", "</small>") ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="InputPassword" placeholder="password" name="password">
                    <small class='text-danger'><?= form_error('password') ?></small>
                </div>
                <div class="btn-login px-5 mb-3">
                    <button type="submit" class="btn btn-block btn-primary">Submit</button>
                </div>
                <p class="text-center">already have an account? <span><a href="<?= site_url('main/login') ?>">sign in!</a></span></p>
            </form>
        </div>
    </div>
</div>