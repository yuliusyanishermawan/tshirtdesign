<?php
$title = 'Login';
include('includes/config.php');
include('includes/header.php');
include('action/loginact.php');
?>

<main id="main">
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
        <div class="container">

            <div class="section-title">
                <h2>Login</h2>
            </div>

            <div class="faq-list col-8 text-white" style="margin: 0 auto;">
                <form method="POST" enctype="multipart/form-data">
                    <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
                    <div class="form-group">
                        <label for="floatingInput">Email address</label>
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                    </div>
                    <div class="form-group">
                        <label for="floatingPassword">Password</label>
                        <input type="password" class="form-control" id="floatingPassword" placeholder="password" name="password">
                    </div>
                    <div class="form-group" style="margin-top: 10px;">
                        <label style="display:block; width:x; height:y; text-align:right;"><a href="lupapassword" class="text-white">Lupa Password</a></label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Sign in</button>
                    <div class="form-group" style="margin-top: 10px;">
                        <label>Belum memiliki akun? Silahkan</label>
                        <label style="margin-left: -25px;"><a href="register" class="text-white">Daftar</a></label>
                    </div>
                </form>
            </div>
        </div>
    </section><!-- End Frequently Asked Questions Section -->


</main><!-- End #main -->
<?php
include('includes/footer.php');
?>