<?php
$title = 'Masuk Token Untuk ';
include('includes/config.php');
include('includes/header.php');
?>

<main id="main">
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
        <div class="container">

            <div class="section-title">
                <h2>Lupa Password</h2>
            </div>

            <div class="faq-list col-8 text-white" style="margin: 0 auto;">
                <form method="POST" enctype="multipart/form-data">
                    <h1 class="h3 mb-3 fw-normal text-center">Please Insert Email And Token To Change Password</h1>
                    <div class="form-group">
                        <label for="floatingInput">Email address</label>
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                    </div>
                    <div class="form-group">
                        <label for="floatingInput">Token</label>
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="token">
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit" name="gettoken">Ubah Password</button>
                </form>
            </div>
        </div>
    </section><!-- End Frequently Asked Questions Section -->


</main><!-- End #main -->
<?php
include('includes/footer.php');
if (isset($_POST['gettoken'])) {
    $email = $_POST['email'];
    $token = $_POST['token'];
    $sql = "SELECT * FROM tbl_user WHERE email='$email' AND token='$token'";
    $query = mysqli_query($koneksidb, $sql);
    $results = mysqli_fetch_array($query);
    if (mysqli_num_rows($query) > 0) {
        echo "<script type='text/javascript'> document.location = 'ubahpasswordtoken?email=$email&token=$token'; </script>";
    } else {
        echo "<script>alert('Email atau Token salah');</script>";
    }
}
?>