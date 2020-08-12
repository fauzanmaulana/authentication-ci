<div class="row m-0">
    <div class="col-lg-6">
        <img src="<?= base_url('assets/images/hero-motio.gif') ?>" width="650" alt="lelang">
    </div>
    <div class="col-lg-6 d-flex align-items-center">
        <div class="container px-5">
            <h2 class="text-center">Login</h2>
            <form action="" method="post">
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" name="email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password" name="password">
                </div>
                <div class="btn-login px-5 mb-3">
                    <button type="submit" class="btn btn-block btn-primary">Submit</button>
                </div>
            </form>
            <p class="text-center">have no an account? <span><a href="<?= site_url('main/register') ?>">sign up!</a></span></p>
        </div>
    </div>
</div>