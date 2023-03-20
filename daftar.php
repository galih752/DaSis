<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.2.2-dist/css/bootstrap.css">
    <title>Tambah Siswa</title>
</head>
<body>
<form class="row g-3" action="" method="post">
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control" id="nama" name="nama">
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">NISN</label>
    <input type="text" class="form-control" id="nisn" name="nisn">
  </div>
  <div class="col-md-6">
    <label for="validationDefault03" class="form-label">Kelas</label>
    <input type="text" style="display: block;width: 100%;padding: 0.375rem 0.75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: 0.375rem;transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;" id="kelas" name="kelas">
  </div>
  <div class="col-md-3">
    <label for="validationDefault05" class="form-label">Tanggal Lahir</label>
    <input type="date" style="display: block;width: 65%;padding: 0.375rem 0.75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: 0.375rem;transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;" id="ttl" name="ttl">
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="simpan">SIMPAN</button>
  </div>
</form>
<?php
include("koneksi.php");
if(isset($_POST['simpan'])){
    mysqli_query($koneksi, "INSERT INTO siswa SET
    nisn = '$_POST[nisn]',
    nama = '$_POST[nama]',
    kelas = '$_POST[kelas]',
    tanggallahir = '$_POST[ttl]'");

echo "Data Baru Telah Tersimpan!";
echo "<meta http-equiv=refresh content=1;URL='index.php'>";
}
?>

</body>
</html>