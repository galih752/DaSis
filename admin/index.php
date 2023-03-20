<?php
include("session.php");
?>
<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <!-- css crud -->
    <style>
        .hapus {
            border: 1px solid #db5d59;
            background: #db5d59 url('images/hapus.png') no-repeat 5px 4px;
            height: 22px;
            padding-left: 15px;
            padding-top: 5px;
            border-radius: 3px;
        }

        .hapus:hover {
            box-shadow: 4px 4px 6px black;
        }

        .edit {
            border: 1px solid #00b3a8;
            background: #00b3a8 url('images/edit.png') no-repeat 5px 4px;
            height: 22px;
            padding-left: 15px;
            padding-top: 5px;
            border-radius: 3px;
        }

        .edit:hover {
            box-shadow: 4px 4px 6px black;
        }
    </style>
    <!-- animasi -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
    </style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <title>DaSis!</title>
</head>

<body>
    <section id="home" class="banner" role="banner">
        <!-- Navigation Section -->
        <header id="header">
            <div class="header-content clearfix"> <a class="logo" href="#home">DaSis!</a>
                <nav class="navigation" role="navigation">
                    <ul class="primary-nav">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#data-siswa">Data Siswa</a></li>
                        <li><a href="#data-guru">Data Guru</a></li>
                        <li><a href="#nilai-siswa">Nilai</a></li>
                        <li><a href="#Gallery">Gallery</a></li>
                        <li></li>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </nav>
                <a href="#" class="nav-toggle">Menu<span></span></a>
            </div>
        </header>
        <!-- Navigation Section -->
        <!-- Banner Section -->
        <div data-aos="zoom-in" data-aos-duration="1500">
            <div class="container">
                <div class="col-md-7 banner-inner-wrapper">
                    <div class="banner-text">
                        <h1>Selamat datang di aplikasi DaSis!</h1>
                        <p>Aplikasi DaSis! atau Data Siswa adalah aplikasi berbasis web yang digunakan untuk mengelola
                            data siswa, data guru hingga nilai siswa.</p>
                        <!-- banner text -->
                    </div>
                </div>
            </div>
    </section><br><br><br>

    <!-- Data Siswa -->
    <section id="data-siswa">
        <div data-aos="fade-up" data-aos-anchor-placement="center-center" data-aos-duration="1500">
            <h1 align="center">Data Siswa</h1><br>
            <table class="table table-striped">
                <tr>
                    <th style="text-align:center;">NISN</th>
                    <th style="text-align:center;">Nama</th>
                    <th style="text-align:center;">Kelas</th>
                    <th style="text-align:center;">Tanggal Lahir</th>
                    <th style="text-align:center;" colspan="2">Action</th>
                </tr>
                <?php
                include("koneksi.php");
                $qry = mysqli_query($koneksi, "SELECT * FROM siswa");
                while ($tampil = mysqli_fetch_array($qry)) {
                    echo "
            <tr>
            <td style='text-align:center;'>$tampil[nisn]</td>
            <td style='text-align:center;'>$tampil[nama]</td>
            <td style='text-align:center;'>$tampil[kelas]</td>
            <td style='text-align:center;'>$tampil[tanggallahir]</td>
            <td style='text-align:center;'><a href='?id=$tampil[nisn]' style='color:white; text-decoration:none;'> <input type='button' class='hapus' ></a></td>
            <td style='text-align:center;'><a href='edit-siswa.php?id=$tampil[nisn]' style='color:white; text-decoration:none;'><input type='button' class='edit' ></a></td>
            </tr>
            ";
                }
                ?>
            </table>
            ><a href="tambah-siswa.php" class="btn"
                style="text-decoration:none; color:grey;display:block;margin:auto; margin-left:40%;margin-right:40%;"
                style="text-decoration:none; color:grey;">Tambah Data</a>
        </div>
        </div>
    </section><br><br>

    <!-- Data Guru -->
    <section id="data-guru">
        <div data-aos="zoom-in" data-aos-duration="1500">
            <h1 align="center">Data Guru</h1><br>
            <table class="table table-striped">
                <tr>
                    <th style="text-align:center;">Kode Guru</th>
                    <th style="text-align:center;">NIP</th>
                    <th style="text-align:center;">Nama</th>
                    <th style="text-align:center;">Jabatan</th>
                    <th style="text-align:center;">Mata Pelajaran</th>
                    <th style="text-align:center;" colspan="2">Action</th>
                </tr>
                <?php
                include("koneksi.php");
                $qry = mysqli_query($koneksi, "SELECT * FROM data_guru");
                while ($tampil = mysqli_fetch_array($qry)) {
                    echo "
            <tr>
            <td style='text-align:center;'>$tampil[kode]</td>
            <td style='text-align:center;'>$tampil[nip]</td>
            <td style='text-align:center;'>$tampil[nama]</td>
            <td style='text-align:center;'>$tampil[jabatan]</td>
            <td style='text-align:center;'>$tampil[namamapel]</td>
            <td style='text-align:center;'><a href='?nip=$tampil[nip]' style='color:white; text-decoration:none;'> <input type='button' class='hapus' ></a></td>
            <td style='text-align:center;'><a href='edit-guru.php?nip=$tampil[kode]' style='color:white; text-decoration:none;'><input type='button' class='edit' ></a></td>
            </tr>
            ";
                }
                ?>
            </table>
            <a href="tambah-guru.php" class="btn"
                style="text-decoration:none; color:grey;display:block;margin:auto; margin-left:40%;margin-right:40%;">Tambah
                Data</a>
        </div>
        </div>
    </section> <br><br>

    <!-- Nilai Siswa -->
    <section id="nilai-siswa">
        <div data-aos="fade-up" data-aos-duration="1500">
            <h1 align="center">Nilai</h1><br>
            <table class="table table-striped">
                <tr>
                    <th style="text-align:center;">Rank</th>
                    <th style="text-align:center;">Nama</th>
                    <th style="text-align:center;">Kelas</th>
                    <th style="text-align:center;">Nilai Pengetahuan</th>
                    <th style="text-align:center;">Nilai Keterampilan</th>
                    <th style="text-align:center;">Nilai Sikap</th>
                    <th style="text-align:center;">Rata Rata</th>
                    <th style="text-align:center;">Keterangan</th>
                    <th style="text-align:center;" colspan="2">Action</th>
                </tr>
                <?php
                include("koneksi.php");
                $no=1;
                $no++;
                $no=1;
                $qry = mysqli_query($koneksi, "SELECT * FROM nilai_web ");
                while ($tampil = mysqli_fetch_assoc($qry)) {
                $rata = $tampil['rata_rata'];
                    if($rata > 95){
                        $grade = "Lulus dengan predikat A+";
                    }elseif($rata >= 90 & $rata < 95){
                        $grade = "Lulus dengan predikat A";
                    }elseif($rata >= 85 & $rata < 90){
                        $grade = "Lulus dengan predikat B";
                    }elseif($rata >= 80 & $rata < 85){
                        $grade = "Lulus dengan predikat C";
                    }elseif($rata == 0){
                        $grade = "Tidak ada nilai";
                    }else{
                        $grade = "Lulus dengan predikat D [PERBAIKI!]";
                    }
                    echo "
            <tr>
            <td style='text-align:center;'>$no</td>
            <td style='text-align:center;'>$tampil[nama]</td>
            <td style='text-align:center;'>$tampil[kelas]</td>
            <td style='text-align:center;'>$tampil[nilai1]</td>
            <td style='text-align:center;'>$tampil[nilai2]</td>
            <td style='text-align:center;'>$tampil[nilai3]</td>
            <td style='text-align:center;'>$tampil[rata_rata]</td>
            <td style='text-align:center;'>$grade</td>
            <td style='text-align:center;'><a href='edit-nilai.php?kode=$tampil[id]' style='color:white; text-decoration:none;'><input type='button' class='edit' ></a></td>
            </tr>
            ";
            
            $no++;
                }
                ?>
            </table>
            <a href="tambah-nilai.php" class="btn"
                style="text-decoration:none; color:grey;display:block;margin:auto; margin-left:40%;margin-right:40%;"
                style="text-decoration:none; color:grey;">Tambah Data</a>
        </div>
        </div>
    </section><br><br>

    <!-- work section -->
    <section id="Gallery" class="works section no-padding">
        <div data-aos="zoom-in" data-aos-duration="1500">
            <div class="container-fluid">
                <div class="row no-gutter">
                    <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="images/work-1.jpg" class="work-box"> <img
                                src="images/work-1.jpg" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <p><i class="fa fa-search-plus fa-2x"></i></p>
                                </div>
                            </div>
                            <!-- overlay -->
                        </a> </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="images/work-2.jpg" class="work-box"> <img
                                src="images/work-2.jpg" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <p><i class="fa fa-search-plus fa-2x"></i></p>
                                </div>
                            </div>
                            <!-- overlay -->
                        </a> </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="images/work-3.jpg" class="work-box"> <img
                                src="images/work-3.jpg" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <p><i class="fa fa-search-plus fa-2x"></i></p>
                                </div>
                            </div>
                            <!-- overlay -->
                        </a> </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="images/work-4.jpg" class="work-box"> <img
                                src="images/work-4.jpg" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <p><i class="fa fa-search-plus fa-2x"></i></p>
                                </div>
                            </div>
                            <!-- overlay -->
                        </a> </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="images/work-5.jpg" class="work-box"> <img
                                src="images/work-5.jpg" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <p><i class="fa fa-search-plus fa-2x"></i></p>
                                </div>
                            </div>
                            <!-- overlay -->
                        </a> </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="images/work-6.jpg" class="work-box"> <img
                                src="images/work-6.jpg" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <p><i class="fa fa-search-plus fa-2x"></i></p>
                                </div>
                            </div>
                            <!-- overlay -->
                        </a> </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="images/work-7.jpg" class="work-box"> <img
                                src="images/work-7.jpg" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <p><i class="fa fa-search-plus fa-2x"></i></p>
                                </div>
                            </div>
                            <!-- overlay -->
                        </a> </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="images/work-8.jpg" class="work-box"> <img
                                src="images/work-8.jpg" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <p><i class="fa fa-search-plus fa-2x"></i></p>
                                </div>
                            </div>
                            <!-- overlay -->
                        </a> </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="images/work-9.jpg" class="work-box"> <img
                                src="images/work-9.jpg" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <p><i class="fa fa-search-plus fa-2x"></i></p>
                                </div>
                            </div>
                            <!-- overlay -->
                        </a> </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="images/work-10.jpg" class="work-box"> <img
                                src="images/work-10.jpg" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <p><i class="fa fa-search-plus fa-2x"></i></p>
                                </div>
                            </div>
                            <!-- overlay -->
                        </a> </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="images/work-11.jpg" class="work-box"> <img
                                src="images/work-11.jpg" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <p><i class="fa fa-search-plus fa-2x"></i></p>
                                </div>
                            </div>
                            <!-- overlay -->
                        </a> </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="images/work-12.jpg" class="work-box"> <img
                                src="images/work-12.jpg" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <p><i class="fa fa-search-plus fa-2x"></i></p>
                                </div>
                            </div>
                            <!-- overlay -->
                        </a> </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/retina.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/main.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
<?php
if (isset($_GET['id'])) {
    mysqli_query($koneksi, "DELETE FROM siswa WHERE nisn='$_GET[id]'");


    echo "Data Telah Terhapus";
    echo "<meta http-equiv=refresh content=0;URL='index.php'>";
} elseif (isset($_GET['nip'])) {
    mysqli_query($koneksi, "DELETE FROM guru WHERE nip='$_GET[nip]'");


    echo "Data Telah Terhapus";
    echo "<meta http-equiv=refresh content=0;URL='index.php'>";
}
?>