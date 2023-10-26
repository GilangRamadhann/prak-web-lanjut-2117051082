<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<div class="container">
  <div class="row">
    <h3 class="mt-3">List anggota Kelas</h3>
    <table class="table table-striped mt-2">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Kelas</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($kelas as $kelas) { ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $kelas['nama'] ?></td>
            <td><?= $kelas['nama_kelas'] ?></td>
          </tr>
        <?php }
        ?>
      </tbody>
    </table>
  </div>
</div>
<?= $this->endSection('content') ?>