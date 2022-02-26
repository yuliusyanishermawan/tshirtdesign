<?php
$title = 'Frequently Asked Questions';
session_start();
error_reporting(0);
include('includes/config.php');
include('action/loginact.php');
include('includes/header.php');
include('includes/hero.php');
?>
<section id="faq" class="faq">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Frequently Asked Questions</h2>
            <p>Pertanyaan yang sering ditanyakan di Dope Wild Sablon's</p>
        </div>

        <div class="faq-list">
            <ul>
                <?php
                $nomor = 0;
                $sqltblberita = "SELECT * FROM tbl_faq WHERE status='Tampil'";
                $querytblberita = @mysqli_query($koneksidb, $sqltblberita);
                while ($result = @mysqli_fetch_array($querytblberita)) {
                    $nomor++;
                ?>
                    <li data-aos="fade-up" data-aos-delay="200">
                        <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-<?php echo htmlentities($nomor); ?>" class="collapsed"><?php echo htmlentities($result['isi_faq']); ?>?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-<?php echo htmlentities($nomor); ?>" class="collapse" data-parent=".faq-list">
                            <p>
                                <?php echo htmlentities($result['tanggapan']); ?>
                            </p>
                        </div>
                    </li>
                <?php } ?>

            </ul>
        </div>

    </div>
</section><!-- End Frequently Asked Questions Section -->


<?php
include('includes/footer.php');
?>