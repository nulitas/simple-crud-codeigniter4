<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>



<div class="container m-5">
    <div class="row  mt-5">
        <div class="col ">
            <form action="<?= base_url('/main/save') ?>" method="POST">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label for="title" class="form-label">Student ID</label>
                    <input type="text" class="form-control <?= (validation_show_error('student_id')) ? 'is-invalid' : '' ?>" autofocus value="<?= old('student_id') ?>" id="student_id" aria-describedby="student_id" name="student_id">
                    <div class="invalid-feedback">
                        <?= validation_show_error('student_id'); ?>
                    </div>

                </div>


                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control <?= (validation_show_error('name')) ? 'is-invalid' : '' ?>" id="name" name="name">
                    <div class="invalid-feedback">
                        <?= validation_show_error('name'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="dependent_data" class="form-label">Major</label>

                    <select name="dependent_data" id="dependent_data" class="form-select form-select-border <?= (validation_show_error('dependent_data')) ? 'is-invalid' : '' ?>">
                        <?php foreach ($dependent as $d) : ?>
                            <option value="<?= $d['id'] ?>"> <?= $d['name'] ?> </option>
                        <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= validation_show_error('dependent_data'); ?>
                    </div>

                </div>

                <div class="mb-3">
                    <p>Gender</p>
                    <input type="radio" id="gender" name="gender" value="Laki-laki" class="<?= (validation_show_error('gender')) ? 'is-invalid' : '' ?>">
                    <label for="gender">Laki-laki</label><br>

                    <input type="radio" id="gender" name="gender" value="Perempuan" class="<?= (validation_show_error('gender')) ? 'is-invalid' : '' ?>">
                    <label for="gender">Perempuan</label><br>


                    <div class="invalid-feedback">
                        <?= validation_show_error('gender'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="place_birth" class="form-label">Place of Birth</label>
                    <input type="text" class="form-control <?= (validation_show_error('place_birth')) ? 'is-invalid' : '' ?>" id="place_birth" name="place_birth">
                    <div class="invalid-feedback">
                        <?= validation_show_error('place_birth'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="date_birth" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control  <?= (validation_show_error('date_birth')) ? 'is-invalid' : '' ?>" id="date_birth" name="date_birth">
                    <div class="invalid-feedback">
                        <?= validation_show_error('date_birth'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control <?= (validation_show_error('address')) ? 'is-invalid' : '' ?>" id="address" name="address">
                    <div class="invalid-feedback">
                        <?= validation_show_error('address'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">No Telp</label>
                    <input type="text" class="form-control  <?= (validation_show_error('no_telp')) ? 'is-invalid' : '' ?>" id="no_telp" name="no_telp">
                    <div class="invalid-feedback">
                        <?= validation_show_error('no_telp'); ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>