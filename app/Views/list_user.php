
<?= $this->extend('layouts/app')?>
<?= $this->section('content')?>
    <!-- Ini halaman list user -->
 
<div class="container">
    <div class="row">
    <h3 class="mt-5">Tabel List User :</h3>

    <div class="col-3">
      <a href="<?= base_url('user/create')?>" class="btn btn-primary">Tambah data</a>
    </div>
    <table class="table table-dark mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user){
            ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['nama'] ?></td>
                    <td><?= $user['npm'] ?></td>
                    <td><?= $user['nama_kelas'] ?></td>

                    <td>
                        <div class="wrap d-flex justify-content-start align-items-center">
                            <a href="<?= base_url('user/' . $user['id']) ?>" class="btn btn-primary me-2">Detail</a>
                            <a href="<?= base_url('user/' . $user['id'] . '/edit') ?>" class="btn btn-warning me-2">Edit</a>
                            <form action="<?=base_url('user/' . $user['id'])?>" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <?= csrf_field() ?>
                                <input type="submit" class="btn btn-danger" value="Delete" style="width: 80px; height: 40px;">
                            </form>
                        </div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
</table>
<?= $this->endSection()?>