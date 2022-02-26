<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['user']) == 0) {
    header('location:login.php');
} else {
    $title = 'Profile User';
    include('includes/config.php');
    include('action/loginact.php');
    include('includes/header.php');
?>
    <!-- ======= Hero Section ======= -->
    <section id="faq" class="d-flex align-items-center faq">

        <div class="container-fluid col-8" data-aos="fade-up">
            <div class="section-title">
                <h2>User Profile</h2>
            </div>
            <?php
            $user = $_SESSION['user'];
            $sql = "SELECT * from tbl_user where email='$user'";
            $query = mysqli_query($koneksidb, $sql);
            $result = mysqli_fetch_array($query);
            ?>
            <div class="row">
                <div class=" container-fluid col-10 center text-white">

                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" value="<?php echo htmlentities($result['email']); ?>" readonly>
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlInput1">Nama Lengkap</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo htmlentities($result['nama_lengkap']); ?>" readonly>
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlInput1">Nomor Telfon</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo htmlentities($result['nomor']); ?>" readonly>
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlInput1">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo htmlentities($result['jenis_kelamin']); ?>" readonly>
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlInput1">Alamat</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo htmlentities($result['alamat']); ?>" readonly>
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlInput1">Mendaftar</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo date('d F Y', strtotime($result['created'])); ?>" readonly>
                        </div>
                        <br>
                        <a href="ubahpassword.php" class="w-100 btn btn-lg btn-primary">Ubah Password</a>
                    </form>

                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div>

    </section><!-- End Hero -->

<?php
    include('includes/footer.php');
}
?>