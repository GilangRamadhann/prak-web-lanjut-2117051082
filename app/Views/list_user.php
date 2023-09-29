
<?= $this->extend('layouts/app')?>
<?= $this->section('content')?>
    <!-- Ini halaman list user -->
    
    <div class="container">
    <div class="row">
    <h3 class="mt-5">Tabel List User :</h3>
    <table class="table table-dark">
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
                        <a class="btn btn-primary" href="">Detail</a>
                        <a class="btn btn-warning" href="">Edit</a>
                        <a class="btn btn-danger" href="">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
</table>
<?= $this->endSection()?>