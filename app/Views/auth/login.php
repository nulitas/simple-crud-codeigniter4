<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>



<div class="container m-5">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <form action="/auth/process" method="POST">
                <?= csrf_field(); ?>


                <?php
                if (session()->getFlashData('msg')) {
                    echo session()->getFlashData('msg');
                }
                ?>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password">
                </div>
                <p>Don't have account ? <a href="<?= base_url('register') ?>">Register</a></p>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>