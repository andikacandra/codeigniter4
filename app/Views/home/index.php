<?php echo $this->extend('layout/template'); ?>

<?php echo $this->section('content') ?>
<div class="col-md-6">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Data</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="<?php echo base_url('Home/simpan/'); ?>" method="POST">
                <?php echo csrf_field() ?>
                <div class="form-group">
                    <label>Nama <sup>*</sup></label>
                    <input type="text" class="form-control <?php echo ($validation->hasError('Nama') ? 'is-invalid' : ''); ?>" name="Nama" value="<?php echo old('Nama'); ?>" autofocus>
                    <small style="color: red;"><?php echo $validation->getError('Nama'); ?></small>
                </div>
                <div class="form-group">
                    <label>Alamat <sup>*</sup></label>
                    <input type="text" class="form-control <?php echo ($validation->hasError('Alamat') ? 'is-invalid' : ''); ?>" name="Alamat" value="<?php echo old('Alamat'); ?>">
                    <small style="color: red;"><?php echo $validation->getError('Alamat'); ?></small>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control <?php echo ($validation->hasError('Email') ? 'is-invalid' : ''); ?>" name="Email" value="<?php echo old('Email'); ?>">
                    <small style="color: red;"><?php echo $validation->getError('Email'); ?></small>
                </div>
                <div>
                    <hr>
                    <button type="submit" class="btn btn-success" style="width: 100%;">Tambah data</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">List Data</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php if (session()->getFlashdata('pesan')) { ?>
                <div>
                    <p><?php echo session()->getFlashdata('pesan'); ?></p>
                </div>
            <?php } ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="body-pegawai">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection() ?>