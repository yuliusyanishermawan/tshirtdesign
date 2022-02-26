<?php
$title = 'Lupa Password';
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
                <form method="POST" action="action/lupapasswordact" enctype="multipart/form-data">
                    <h1 class="h3 mb-3 fw-normal text-center">Please Insert Email To Get Token</h1>
                    <div class="form-group">
                        <label for="floatingInput">Email address</label>
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Get Token</button>
                    <div class="form-group" style="margin-top: 10px;">
                        <label>Sudah Mendapatkan Token?</label>
                        <label style="margin-left: -25px;"><a href="masuktoken" class="text-white">Input Token</a></label>
                    </div>
                </form>
            </div>
        </div>
    </section><!-- End Frequently Asked Questions Section -->


</main><!-- End #main -->
<?php
include('includes/footer.php');
?>