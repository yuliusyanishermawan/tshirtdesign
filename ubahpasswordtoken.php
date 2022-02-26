<?php
session_start();
error_reporting(0);
if (strlen($_GET['email'] || $_GET['token']) == 0) {
    header('location:index.php');
} else {
    $title = 'Ubah Password Token';
    include('includes/config.php');
    include('includes/header.php');
?>

    <main id="main">
        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq">
            <div class="container">

                <div class="section-title">
                    <h2>Ubah Password</h2>
                </div>
                <?php
                $email = $_GET['email'];
                $token = $_GET['token'];
                ?>
                <div class="faq-list col-8 text-white" style="margin: 0 auto;">


                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Password Baru</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email" value="<?php echo $email ?>" name="email" hidden>
                            <input type="password" class="form-control" placeholder="Password Baru" name="passwordbaru">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Konfirmasi Password Baru" name="passwordbaruconfirm">
                        </div>
                        <br>
                        <button type="submit" class="w-100 btn btn-lg btn-primary" name="simpan">Simpan</button>
                </div>
                </form>


            </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->


    </main><!-- End #main -->
<?php
    include('includes/footer.php');

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
            $sql     = "UPDATE tbl_user SET password='$mdpasswordbaruconfirm', token='' WHERE email='$email'";
            $query     = mysqli_query($koneksidb, $sql);
            if ($query) {
                echo "<script type='text/javascript'>
                  alert('Berhasil mengubah password.'); 
                  document.location = 'login.php'; 
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