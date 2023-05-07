<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col">

            <h1 class="mt-2">Student List</h1>
            <a href="/main/create" class="btn btn-primary">Add</a>

            <?php if (session()->getFlashdata('msg')) : ?>

                <div class="alert alert-success m-2" role="alert">
                    <?= session()->getFlashdata('msg') ?>
                </div>

            <?php endif; ?>


            <?php if (session()->getFlashdata('delete')) : ?>


                <div class="alert alert-danger m-2" role="alert">
                    <?= session()->getFlashdata('delete') ?>
                </div>

            <?php endif; ?>




            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $i = 1; ?>
                    <?php foreach ($student as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?> </th>

                            <td> <?= $s['student_id'] ?> </td>
                            <td> <?= $s['name'] ?> </td>
                            <td>
                                <a href="/main/<?= $s['id'] ?>" class="btn btn-success">Details</a>
                                <a href="/main/edit/<?= $s['id'] ?>" class="btn btn-success">Edit</a>
                                <form action="/main/<?= $s['id'] ?>" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Delete?');"> Delete </button>
                                </form>
                            </td>
                        </tr>

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>