<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.2.2-dist/css/bootstrap.css">
    <title>Log In</title>
</head>
<body>
<section class="vh-100" style="background-color: #B2B2B2;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>

            <div class="form-outline mb-4">
              <input type="email" id="typeEmailX-2" name="NIP" class="form-control form-control-lg" />
              <label class="form-label" for="typeEmailX-2">NIP</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="typePasswordX-2" class="form-control form-control-lg" />
              <label class="form-label" for="typePasswordX-2">Password</label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit" name="proseslog">Login</button>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
        if(isset($_POST['proseslog'])){
            $sql=mysqli_query($koneksi,"select * from guru where nip='$_POST[nip]'
            and password = '$_POST[password]' ");

            $cek = mysqli_num_rows($sql);
                if($cek > 0){
                    $_SESSION['username'] = $_POST['username'];

                    echo "<meta http-equiv=refresh content=0;URL='admin/index.php'>";
                }else{
                    echo "<script>";
                    echo "alert ('Username dan Password Salah!!')";
                    echo "</script>";
                    echo "<meta http-equiv=refresh content=0;URL='login.php'>";
                }
            }
        ?>
</body>
</html>