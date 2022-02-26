<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['user']) == 0) {
    header('location:login.php');
} else {
    $title = 'Ubah Password';
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
                $user = $_SESSION['user'];
                $sql = "SELECT * from tbl_user where email='$user'";
                $query = mysqli_query($koneksidb, $sql);
                $result = mysqli_fetch_array($query);
                ?>
                <div class="faq-list col-8 text-white" style="margin: 0 auto;">


                    <form method="POST" action="action/ubahpasswordact.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Password Lama</label>
                            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password Lama" name="passwordlama">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Password Baru</label>
                            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password Baru" name="passwordbaru">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Konfirmasi Password Baru" name="passwordbaruconfirm">
                        </div>
                        <br>
                        <button type="submit" class="w-100 btn btn-lg btn-primary">Simpan</button>
                </div>
                </form>


            </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->


    </main><!-- End #main -->
<?php
    include('includes/footer.php');
}
?>