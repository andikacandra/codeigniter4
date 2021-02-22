<?php echo $this->extend('layout/template'); ?>

<?php echo $this->section('content') ?>
<h1>Update Pegawai</h1>
<a href="<?php echo base_url('Home/'); ?>"><button>Kembali</button></a>

<div class="panel-add" style="margin-top: 5px;">
    <form action="<?php echo base_url('Home/simpanUpdate/' . $pegawai['Token']); ?>" method="POST">
        <?php echo csrf_field() ?>
        <div class="form-item">
            <label>Nama <sup>*</sup></label>
            <input type="text" class="<?php echo ($validation->hasError('Nama') ? 'is-invalid' : ''); ?>" name="Nama" value="<?php echo (!empty(old('Nama')) ? old('Nama') : $pegawai['Nama']); ?>" autofocus>
            <small style="color: red;"><?php echo $validation->getError('Nama'); ?></small>
        </div>
        <div class="form-item">
            <label>Alamat <sup>*</sup></label>
            <input type="text" class="<?php echo ($validation->hasError('Alamat') ? 'is-invalid' : ''); ?>" name="Alamat" value="<?php echo (!empty(old('Alamat')) ? old('Alamat') : $pegawai['Alamat']); ?>">
            <small style="color: red;"><?php echo $validation->getError('Alamat'); ?></small>
        </div>
        <div class="form-item">
            <label>Email</label>
            <input type="email" class="<?php echo ($validation->hasError('Email') ? 'is-invalid' : ''); ?>" name="Email" value="<?php echo (!empty(old('Email')) ? old('Email') : $pegawai['Email']); ?>">
            <small style="color: red;"><?php echo $validation->getError('Email'); ?></small>
        </div>
        <div>
            <hr>
            <button type="submit" style="width: 100%;">Update data</button>
        </div>
    </form>
</div>
<?php echo $this->endSection() ?>