<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Project.Crud</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url('/') ?>">Home</a>
                </li>

                <?php if (session()->get('isLoggedIn')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('main/index') ?>">Student</a>
                    </li>
                    <li><a href="<?= base_url(['logout']) ?>" class="nav-link " onclick="return confirm('Logout?');" role="button">Logout</a></li>
                <?php else : ?>
                    <li><a href="<?= base_url(['login']) ?>" class="nav-link " role="button">Login</a></li>
                <?php endif ?>


            </ul>
        </div>
    </div>
</nav>