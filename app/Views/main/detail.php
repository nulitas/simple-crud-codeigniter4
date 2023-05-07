<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>




<div class="container">



    <div class="row">
        <div class="col">

            <h1>Detail</h1>
            <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= $student['student_id'] ?></li>
                    <li class="list-group-item"> <?= $student['name'] ?> </li>


                    <li class="list-group-item"><?= $dependent ?></li>
                    <li class="list-group-item"><?= $student['gender'] ?></li>
                    <li class="list-group-item"><?= $student['place_birth'] ?></li>
                    <li class="list-group-item"><?= $student['date_birth'] ?></li>
                    <li class="list-group-item"><?= $student['no_telp'] ?></li>
                    <li class="list-group-item"><?= $student['address'] ?></li>
                </ul>
            </div>
        </div>

    </div>


    <?= $this->endSection(); ?>