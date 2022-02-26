<?php
$title = 'Detail Berita';
session_start();
error_reporting(0);
include('includes/config.php');
include('action/loginact.php');
include('includes/header.php');
include('includes/hero.php');
?>

<section id="about" class="about">
    <div class="container">
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_berita WHERE id_berita='$id'";
        $query = mysqli_query($koneksidb, $sql);
        $result = mysqli_fetch_array($query);
        ?>
        <div class="section-title">
            <h2>Detail Berita <?php echo htmlentities($result['nama_berita']); ?></h2>
        </div>
        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
                <img src="admin/image/berita/<?php echo htmlentities($result['gambar_berita']); ?>" class="img-fluid" alt="">
            </div>
            <br>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
                <h3><?php echo htmlentities($result['nama_berita']); ?></h3>
                <p class=" text-break"><?php echo $result['isi_text']; ?></p>
                <p style="text-align: right;" class="font-italic text-end"><?php echo date('d F Y', strtotime($result['create'])); ?></p>
            </div>
        </div>
    </div>
</section><!-- End About Section -->

<?php
include('includes/footer.php');
?>