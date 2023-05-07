<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>



<div class="container m-5">
    <div class="row  mt-5">
        <div class="col">
            <form action="/main/update/<?= $student['id'] ?>" method="POST">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label for="title" class="form-label">Student ID</label>
                    <input type="text" class="form-control <?= (validation_show_error('student_id')) ? 'is-invalid' : '' ?>" autofocus id="student_id" aria-describedby="student_id" name="student_id" value="<?= $student['student_id'] ?>">
                    <div class="invalid-feedback">
                        <?= validation_show_error('student_id'); ?>
                    </div>

                </div>


                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $student['name'] ?>">
                </div>

                <div class="mb-3">
                    <label for="dependent_data" class="form-label">Major</label>

                    <select name="dependent_data" id="dependent_data" class="form-select form-select-border">

                        <?php foreach ($dependent as $d) : ?>
                            <option value="<?= $d['id'] ?>" <?= $student['dependent_data'] == $d['id'] ? 'selected' : '' ?>> <?= $d['name'] ?> </option>
                        <?php endforeach ?>
                    </select>

                </div>

                <div class="mb-3">
                    <p>Gender</p>
                    <input type="radio" id="gender" name="gender" value="Laki-laki" <?= $student['gender'] == 'Laki-laki' ? 'checked' : '' ?>>
                    <label for="gender">Laki-laki</label><br>

                    <input type="radio" id="gender" name="gender" value="Perempuan" <?= $student['gender'] == 'Perempuan' ? 'checked' : '' ?>>
                    <label for="gender">Perempuan</label><br>
                </div>
                <div class="mb-3">
                    <label for="place_birth" class="form-label">Place of Birth</label>
                    <input type="text" class="form-control" id="place_birth" name="place_birth" value="<?= $student['place_birth'] ?>">
                </div>

                <div class="mb-3">
                    <label for="date_birth" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="date_birth" name="date_birth" value="<?= $student['date_birth'] ?>">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?= $student['address'] ?>">
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">No Telp</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $student['no_telp'] ?>">
                </div>

                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>