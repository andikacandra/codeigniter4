<?php echo $this->extend('layout/template'); ?>

<?php echo $this->section('content') ?>
<h1>Detail Pegawai</h1>
<a href="<?php echo base_url('Home/'); ?>"><button>Kembali</button></a>

<div style="border: 1px solid black; padding: 0px 10px; margin-top: 5px; max-width: 300px;">
    <p>
    <h5 style="margin: 0;"><i><u>Nama :</u></i></h5>
    <h4 style="margin: 0;font-family: cursive;"><?php echo $pegawai['Nama'] ?></h4>
    </p>

    <p>
    <h5 style="margin: 0;"><i><u>Alamat :</u></i></h5>
    <h4 style="margin: 0;font-family: cursive"><?php echo $pegawai['Alamat'] ?></h4>
    </p>

    <p>
    <h5 style="margin: 0;"><i><u>Email :</u></i></h5>
    <h4 style="margin: 0;font-family: cursive"><?php echo $pegawai['Email'] ?></h4>
    </p>
</div>
<?php echo $this->endSection() ?>