<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
    <h3 class="mt-5">Tabel Kelas :</h3>

      <div class="col-3">
      <a href="<?= base_url('kelas/create')?>" class="btn btn-primary">Tambah data</a>
      </div>
    <table class="table table-dark mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kapasitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($kelas as $kelas){
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $kelas['nama_kelas'] ?></td>
                    <td><?= $kelas['kapasitas'] ?></td>

                    <td>
                        <a class="btn btn-primary" href="<?= base_url('kelas/' . $kelas['id']) ?>"><i class="fas fa-eye text-dark me-2" aria-hidden="true"></i>Detail</a>
                        <a class="btn btn-warning" href="<?= base_url('kelas/' . $kelas['id'] . '/edit') ?>"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                        <form action="<?=base_url('kelas/' . $kelas['id'])?>" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <?= csrf_field() ?>
                            <input type="submit" class="btn btn-danger" value="Delete" style="width: 80px; height: 40px;">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <?= $this->endSection('content') ?>