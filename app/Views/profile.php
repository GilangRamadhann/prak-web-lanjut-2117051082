<!DOCTYPE html>
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
</head>

<body>
    <!-- <p>Nama: Gilang Ramadhan</p>
    <p>Kelas: CD</p>
    <p>NPM: 2117051082</p> 
    <P>Alamat : Labuhan Ratu</P>-->

<div class="d-flex justify-content-center align-items-center flex-column" style="height:100vh;width:100%;">
  <div class="rounded" style="padding: 20px; border:5px solid red;">
    <h2>Biodata Diri</h2>
<img src="https://avatars.githubusercontent.com/u/92220215?s=400&u=d8b69adfa8f2c9e7dbd9095049fa51834095d196&v=4" class="rounded-circle mx-auto d-block py-3" alt="..." width="160" height="190">
  <table class="mx-auto">
    <tr>
      <td>
        <button type="button" class="btn btn-success" style="width: 320px"><?= $nama
         ?></button>
      </td>
    </tr>
    <tr>
      <td>
        <button type="button" class="btn btn-success" style="width: 320px"><?= $npm ?></button>
      </td>
    </tr>
    <tr>
      <td>
      <button type="button" class="btn btn-success" style="width: 320px"><?= $kelas ?></button>
      </td>
    </tr>
    <tr>
      <td>
      <button type="button" class="btn btn-success" style="width: 320px"><?= $jurusan ?></button>
      </td>
    </tr>
    <tr>
      <td>
      <button type="button" class="btn btn-success" style="width: 320px"><?= $angkatan ?></button>
      </td>
    </tr>
    <tr>
      <td>
      <button type="button" class="btn btn-success" style="width: 320px"><?= $alamat ?></button>
      </td>
    </tr>
  </table>
</body>

</html>