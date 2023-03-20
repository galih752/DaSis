<?php
$user = "rplsmk4padalaran_pramuka";
$hostname = "pramuka-smkn4padalarang.my.id";
$password = "WWc38Ur9";
$dbname = "rplsmk4padalaran_pramuka";

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