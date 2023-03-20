<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:../login.php");
    exit;
}

$sql = mysqli_query($koneksi, "SELECT * FROM nilai");
$data = mysqli_fetch_array($sql);
?>

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
<form class="row g-" action="" method="post">
  <div class="col-md-6">
    <label for="validationDefault05" class="form-label">Nilai Pengetahuan</label>
    <input type="number" style="display: block;width: 25%;padding: 0.375rem 0.75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: 0.375rem;transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;" id="nilai1" name="nilai1" value="<?php echo $data['nilai1']?>">

    <label for="validationDefault05" class="form-label">Nilai Keterampilan</label>
    <input type="number" style="display: block;width: 25%;padding: 0.375rem 0.75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: 0.375rem;transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;" id="nilai2" name="nilai2" value="<?php echo $data['nilai2']?>">
    <label for="validationDefault05" class="form-label">Nilai Sikap</label>
    <input type="number" style="margin-bottom:10px;display: block;width: 25%;padding: 0.375rem 0.75rem;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;-webkit-appearance: none;-moz-appearance: none;appearance: none;border-radius: 0.375rem;transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;" id="nilai3" name="nilai3" value="<?php echo $data['nilai3']?>">
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="simpan">SIMPAN</button>
  </div>
</form>
<?php
include("koneksi.php");
if(isset($_POST['simpan'])){
  mysqli_query($koneksi, "UPDATE nilai SET
  nilai1 ='$_POST[nilai1]',
  nilai2 ='$_POST[nilai2]',
  nilai3 ='$_POST[nilai3]'
  WHERE id = '$_POST[id]'");
echo "Data Baru Telah Tersimpan!";
echo "<meta http-equiv=refresh content=1;URL='index.php#nilai-siswa'>";
}
?>

</body>
</html>