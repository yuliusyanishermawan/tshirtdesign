<?php
$title = "Index";
include('includes/config.php');
include('includes/header.php');
include('includes/hero.php');
?>

<main id="main">


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Testimonials</h2>
                <p>Testimonials pelanggan</p>
            </div>


            <div class="owl-carousel testimonials-carousel">
                <?php
                $nomor = 0;
                $sqltblberita = "SELECT * FROM tbl_order INNER JOIN tbl_user ON tbl_order.id_user=tbl_user.id_user WHERE tbl_order.ulasan >='0' ";
                $querytblberita = @mysqli_query($koneksidb, $sqltblberita);
                while ($result = @mysqli_fetch_array($querytblberita)) {
                    $nomor++;
                ?>

                    <div class="testimonial-item">
                        <p style="height: 150px;">
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            <?php echo htmlentities($result['ulasan']); ?>
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            <br>
                            <?php
                            for ($i = 0; $i < $result['ratings'];) {
                                echo '<i class="bx bxs-star"></i>';
                                $i++;
                            }
                            ?>
                        </p>
                        <h3><?php echo htmlentities($result['nama_lengkap']); ?></h3>
                        <h4> <?php echo htmlentities($result['created']); ?></h4>
                    </div>
                <?php } ?>

            </div>


        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Features Section ======= -->


</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php
include('includes/footer.php');
?>