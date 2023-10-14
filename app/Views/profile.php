<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gilang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <style>
    h2 {
      text-align: center;
    }
  </style>
</head> -->

<!-- <body> -->
    <?= $this->extend('layouts/app')?>
    <?= $this->section('content')?>
    <!-- <p>Nama: Gilang Ramadhan</p>
    <p>Kelas: CD</p>
    <p>NPM: 2117051082</p> 
    <P>Alamat : Labuhan Ratu</P>-->

<div class="d-flex justify-content-center align-items-center flex-column" style="height:100vh;width:100%;">

  <div class="border border-3 rounded" style="padding: 20px;">
      <h2>Biodata Diri</h2>
<img src="<?= $user['foto']?>" class="rounded-circle mx-auto d-block py-3" alt="..." width="160" height="190">
  <table class="mx-auto">
    <tr>
      <td>
        <button class="btn btn-danger" type="button" style="width: 320px"><?= $user['nama']?></button>

      </td>
    </tr>
    <tr>
      <td>

        <button type="button" class="btn btn-danger" style="width: 320px"><?= $user['npm'] ?></button>

      </td>
    </tr>
    <tr>
      <td>

      <button type="button" class="btn btn-danger" style="width: 320px"><?= $user['nama_kelas'] ?></button>

      </td>
    </tr>
  </table>

  <?=$this->endSection()?>
<!-- </body>

</html> -->