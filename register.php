<?php
$title = 'Register';
include('includes/config.php');
include('includes/header.php');
?>

<main id="main">
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
        <div class="container">

            <div class="section-title">
                <h2>Register</h2>
            </div>

            <div class="faq-list col-8 text-white" style="margin: 0 auto;">


                <form method="POST" enctype="multipart/form-data" action="action/registeract">
                    <h1 class="h3 mb-3 fw-normal text-center">Create Your Account</h1>
                    <div class="form-group">
                        <label for="floatingInput">Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama lengkap" name="nama_lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin" required>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="floatingInput">Nomor Telfon</label>
                        <input type="text" class="form-control" placeholder="Masukkan nomor telfon" name="nomor" required>
                    </div>
                    <div class="form-group">
                        <label for="floatingInput">Alamat</label>
                        <input type="text" class="form-control" placeholder="Masukkan alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="floatingInput">Email</label>
                        <input type="email" class="form-control" placeholder="Masukkan alamat" name="email" required>
                        <small id="emailHelp" class="form-text">Gunakan email yang telah terdaftar dalam layanan webmail agar mempermudah dalam lupa password.</small>
                    </div>
                    <div class="form-group">
                        <label for="floatingInput">Password</label>
                        <input type="password" class="form-control" placeholder="Masukkan password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="floatingInput">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Masukkan password" name="confirmpassword" required>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Daftar</button>
                    <div class="form-group" style="margin-top: 10px;">
                        <label>Sudah memiliki akun? Silahkan</label>
                        <label style="margin-left: -25px;"><a href="login" class="text-white">Login</a></label>
                    </div>
                </form>

            </div>

        </div>
    </section><!-- End Frequently Asked Questions Section -->


</main><!-- End #main -->
<?php
include('includes/footer.php');
?>