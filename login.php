<?php 
session_start();
if(isset($_SESSION['id'])) {
  header("Location: index.php");
  exit;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <style>
      body {background-image: url('assets/img/login.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;}
      .card {opacity: 0.9;}
      .container {margin-top: 100px !important;}
    </style>
    <title>Halaman Login</title>
  </head>
  <body>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-5 offset-md-3  mt-5">
        <div class="card">
          <div class="card-header text-center lead">
            Selamat Datang Di Aplikasi Penggajian Pegawai
          </div>
          <div class="card-body">
            <?php 
            if(isset($_POST['masuk'])) {
              $username = htmlspecialchars($_POST['username']);
              $password = htmlspecialchars(md5($_POST['password']));

              if($username == '' || $password == '') { ?>
                <div class="alert alert-danger" role="alert">
                  Form tidak boleh kosong!
                </div>
              <?php
              } else {
                // jika sudah mengisi semua form
                require_once 'config/koneksi.php';
                $sqlLogin = mysqli_query($konek, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'") or die(mysqli_error($konek));
                $jml = mysqli_num_rows($sqlLogin);
                $d = mysqli_fetch_assoc($sqlLogin);

                // jika user & pas ada Di DB
                if($jml > 0) {
                  $_SESSION['id'] = $d['id_admin'];
                  $_SESSION['user'] = $d['username'];
                  $_SESSION['nama'] = $d['nama_lengkap'];

                  header("Location: index.php");
                } else { ?>
                <!-- jika akun tidak di termukan di DB -->
                <div class="alert alert-danger" role="alert">
                  Username & Password Salah!
                </div>
                <?php
                }
              }
            }

            ?>
            <form action="" method="post" class="g-3 needs-validation" novalidate>
              <div class="mb-3">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                </svg>
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username..." autocomplete="off" autofocus="on" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="mb-3">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-key-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                </svg>
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password..." required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="form-group">
                <button type="submit" name="masuk" class="btn btn-primary float-right">Masuk</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>