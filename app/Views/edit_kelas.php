<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<form method="POST" action="<?= base_url('/kelas/'. $kelas['id']) ?>" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    
    <?= csrf_field() ?>

    <div class="d-flex justify-content-center align-items-center flex-column" style="height:100vh;width:100%;">
    <div class="rounded" style="padding: 20px; border:5px solid green;">
    <h2>Form Edit Kelas</h2>

    <table>
         <tr>
             <td>Nama Kelas</td>
             <td>:</td>
             <td><input type="text" class="form-control mt-2 <?= session('validation') && session('validation')->hasError('nama') ? 'is-invalid' : '' ?>" id="floatingName" placeholder="Nama Kelas" name="nama_kelas" value="<?= $kelas['nama_kelas'] ?>">
             <?php if (session('validation') && session('validation')->hasError('nama_kelas')) : ?>
                <div class="invalid-feedback">
                     <?= session('validation')->getError('nama_kelas'); ?>
                </div>
            <?php endif; ?>
            </td> 
         </tr>
         <tr>
             <td>Kapasitas Kelas</td>
             <td>:</td>
             <td><input type="number" class="form-control mt-2 <?= session('validation') ? 'is-invalid' : '' ?>" id="floatingKapasitas" placeholder="Kapasitas" name="kapasitas" value="<?= $kelas['kapasitas'] ?>">
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
<?= $this->endSection('content') ?>