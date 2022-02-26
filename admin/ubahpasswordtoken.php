<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_GET['email'] || $_GET['token']) == 0) {
    header('location:masuktoken.php');
} else {
    $title = 'Ubah Password Token';
    include('includes/config.php');

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log in Dope Wild</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="../index" class="h1"><b>Dope Wild Sablon's</b></a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Lupa Password</p>

                    <form method="post">
                        <?php
                        $email = $_GET['email'];
                        $token = $_GET['token'];
                        ?>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email" value="<?php echo $email ?>" name="email" hidden>
                            <input type="password" class="form-control" placeholder="Password Baru" name="passwordbaru" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Konfirmasi Password Baru" name="passwordbaruconfirm" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-4 offset-4">
                                <button type="submit" class="btn btn-primary btn-block" name="simpan">Simpan</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <!-- /.social-auth-links -->

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="../../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>
    </body>

    </html>
<?php
    if (isset($_POST['simpan'])) {

        include('includes/config.php');
        $passwordbaru = $_POST['passwordbaru'];
        $passwordbaruconfirm = $_POST['passwordbaruconfirm'];
        $email = $_POST['email'];

        if ($passwordbaru != $passwordbaruconfirm) {
            echo "<script type='text/javascript'>
			alert('Password Baru Tidak Sama.');
		</script>";
        } else {

            $mdpasswordbaruconfirm = md5($_POST['passwordbaruconfirm']);
            $sql     = "UPDATE tbl_admin SET password='$mdpasswordbaruconfirm', token='' WHERE email='$email'";
            $query     = mysqli_query($koneksidb, $sql);
            if ($query) {
                echo "<script type='text/javascript'>
                  alert('Berhasil mengubah password.'); 
                  document.location = 'index.php'; 
              </script>";
            } else {
                echo "<script type='text/javascript'>
                  alert('Terjadi kesalahan, silahkan coba lagi!.'); 
              </script>";
            }
        }
    }
}
?>