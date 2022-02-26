<?php
$title = 'Pilih Kaos';
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
            <h2>Pilih Kaos</h2>
            <p>Halaman memilih kaos yang akan didesain</p>
        </div>

        <div class="row">
            <?php
            $nomor = 0;
            $sqltblproduk = "SELECT * FROM tbl_produk";
            $querytblproduk = @mysqli_query($koneksidb, $sqltblproduk);
            while ($result = @mysqli_fetch_array($querytblproduk)) {
                $nomor++;
            ?>
                <div class="col-md-3 col-sm-6">
                    <figure class="card card-product">
                        <div class="img-wrap" style="margin-left:30px; height: 231px; width: 194.5px;background-color: #<?php echo htmlentities($result['kode_warna']); ?>;">
                            <?php
                            if ($result['jenis_kaos'] == 'Lengan Pendek') {
                                echo '<a href="desain?id=';
                                echo $result['nama_produk'];
                                echo '"><img src="assets/desain/img/t-shirts/lenganpendek_depan.png"></a>';
                            } else {
                                echo '<a href="desain?id=';
                                echo $result['nama_produk'];
                                echo '"><img src="assets/desain/img/t-shirts/lenganpanjang_depan.png"></a>';
                            }
                            ?>
                        </div>
                        <figcaption class="info-wrap">
                            <a href="desain?id=<?php echo $result['nama_produk']; ?>" class="title"><?php echo htmlentities($result['nama_produk']); ?></a>
                            <br><br>
                            <p>Jenis Kaos : <?php echo htmlentities($result['jenis_kaos']); ?></p>
                            <p>Warna Kaos : <?php echo htmlentities($result['warna_kaos']); ?></p>
                            <div class="price-wrap">
                                <span class="price-new"> <?php echo "Rp " . number_format($result['harga_produk'], 2, ",", "."); ?></span>
                            </div> <!-- price-wrap.// -->
                        </figcaption>
                    </figure> <!-- card // -->
                </div> <!-- col // -->
            <?php } ?>

        </div>

    </div>
</section><!-- End Services Section -->

<?php
include('includes/footer.php');
?>