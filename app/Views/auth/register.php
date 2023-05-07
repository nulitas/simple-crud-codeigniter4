<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>



<div class="container m-5">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <form action="/auth/store" method="POST">
                <?= csrf_field(); ?>

                <?= $validation->listErrors(); ?>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password">
                </div>
                <div class="mb-3">
                    <label for="passwordconf" class="form-label">Password Confirmation</label>
                    <input type="password" class="form-control" name="passwordconf" id="passwordconf" placeholder="password">
                </div>
                <p>Have an account ? <a href="<?= base_url('login') ?>">Login</a></p>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>