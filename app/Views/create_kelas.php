<?= $this->extend('layouts/app')?>
    <?= $this->section('content')?>

    <form method="POST" action="<?= base_url('/kelas/store') ?>" enctype="multipart/form-data">

    <div class="d-flex justify-content-center align-items-center flex-column" style="height:100vh;width:100%;">
    <div class="rounded" style="padding: 20px; border:5px solid green;">
      <h2>Form Tambah Kelas</h2>
         <table>
         <tr>
             <td>Nama Kelas</td>
             <td>:</td>
             <td><input type="text" class="form-control mt-2 <?= session('validation') && session('validation')->hasError('nama_kelas') ? 'is-invalid' : '' ?>" id="floatingName" placeholder="Nama Kelas" name="nama_kelas" value="<?= old('nama_kelas') ?>">
             <?php if (session('validation') && session('validation')->hasError('nama_kela')) : ?>
                <div class="invalid-feedback">
                     <?= session('validation')->getError('nama_kelas'); ?>
                </div>
            <?php endif; ?>
            </td> 
         </tr>
         <tr>
             <td>Kapasitas</td>
             <td>:</td>
             <td><input type="number" class="form-control mt-2 <?= session('validation') ? 'is-invalid' : '' ?>" id="floatingKapasitas" placeholder="Kapasitas" name="kapasitas" value="<?= old('kapasitas') ?>">
             <?php if (session('validation') && session('validation')->hasError('kapasitas')) : ?>
                <div class="invalid-feedback">
                    <?= session('validation')->getError('kapasitas'); ?>
                </div>
            <?php endif; ?>
            </td>
         </tr>
         <tr>
          <td>
          <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Simpan</button>
          </td>
         </tr>
  </form>
</main>
<?= $this->endSection('content') ?>