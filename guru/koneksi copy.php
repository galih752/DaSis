<?php
$user = "root";
$hostname = "localhost";
$password = "";
$dbname = "dbnilai_galih";

$koneksi = mysqli_connect($hostname, $user, $password);

if($koneksi){
    $buka = mysqli_select_db($koneksi,$dbname);
    if(!$buka){
        echo "Database Tidak Dapat Terhubung";
    }
}
else{
    echo "MySQL tidak Terhubung";
}
?>