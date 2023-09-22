<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <form action="<?=base_url('user/store')?>" method="post">
    <div class="d-flex justify-content-center align-items-center flex-column" style="height:100vh;width:100%;">
    <div class="rounded" style="padding: 20px; border:5px solid green;">
      <h2>Form Biodata Diri</h2>
         <table>
         <tr>
             <td>Nama</td>
             <td>:</td>
             <td><input type="text" name="nama"></td>
         </tr>
         <tr>
             <td>NPM</td>
             <td>:</td>
             <td><input type="text" name="npm"></td>
         </tr>
         <tr>
            <td>Kelas</td>
            <td>:</td>
            <td>
                <select name="kelas" id="kelas">
                    <?php foreach($kelas as $item):?>
                        <option value="<?=$item['id']?>"><?=$item['nama_kelas']?></option>
                    <?php endforeach;?>
                </select>
            </td>
        </tr>
         <tr>
             <td>Jurusan</td>
             <td>:</td>
             <td><input type="text" name="jurusan"></td>
         </tr>
         <tr>
             <td>Angkatan</td>
             <td>:</td>
             <td><input type="text" name="angkatan"></td>
         </tr>
         <tr>
             <td>Alamat</td>
             <td>:</td>
             <td><input type="text" name="alamat"></td>
         </tr>
         <tr>
             <td><input type="submit" value="Simpan"></td>
         </tr>
     </form>
</body>
</html>