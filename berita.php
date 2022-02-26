<?php
$title = 'Berita';
session_start();
error_reporting(0);
include('includes/config.php');
include('action/loginact.php');
include('includes/header.php');
include('includes/hero.php');

?>

<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Berita</h2>
            <p>Halaman Berita dan Event yang diadakan Dope Wild Sablon's</p>
        </div>

        <div class="row">
            <?php
            $sqltblberita = "SELECT * FROM tbl_berita ORDER BY id_berita DESC";
            $querytblberita = @mysqli_query($koneksidb, $sqltblberita);
            while ($result = @mysqli_fetch_array($querytblberita)) {
            ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="margin-bottom: 50px;">
                    <div class="icon-box iconbox-blue">
                        <div class="icon">
                            <img style="width: 200px; height: 200px; border: none;" src="admin/image/berita/<?php echo htmlentities($result['gambar_berita']); ?>">
                        </div>
                        <br><br>
                        <h4><a href="detailberita?id=<?php echo htmlentities($result['id_berita']); ?>"><?php echo htmlentities($result['nama_berita']); ?></a></h4>
                        <p class="text-break" style="text-align: justify;"><?php echo substr($result['isi_text'], 0, 50); ?>... <a href="detailberita?id=<?php echo htmlentities($result['id_berita']); ?>">Read More</a></p>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</section><!-- End Services Section -->

<?php
include('includes/footer.php');
?>