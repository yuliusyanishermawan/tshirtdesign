<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['user']) == 0) {
    header('location:login.php');
} else {
    $title = 'Keranjang';
    include('includes/config.php');
    include('includes/header.php');
?>
    <!-- ======= Hero Section ======= -->
    <section id="faq" class="d-flex align-items-center faq">

        <div class="container-fluid col-11" data-aos="fade-up">
            <div class="section-title">
                <h2>Keranjang</h2>
            </div>
            <div class="row justify-content-center">
                <main class="col-md-9">
                    <div class="card">
                        <table class="table table-borderless table-shopping-cart" id="table">
                            <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col">Gambar Depan</th>
                                    <th scope="col">Gambar Belakang</th>
                                    <th scope="col" class=" text-center">Rincian</th>
                                    <th scope="col" width="120">Banyak</th>
                                    <th scope="col" class="text-center" width="20">Harga</th>
                                    <th scope="col" class="text-center" width="200">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sess = $_SESSION['user'];
                                $arraytotal = [];
                                $nomor = 0;
                                $sqltblberita = "SELECT * FROM tbl_desain_produk_user INNER JOIN tbl_produk ON tbl_desain_produk_user.id_produk=tbl_produk.id_produk INNER JOIN tbl_user ON tbl_desain_produk_user.id_user=tbl_user.id_user WHERE tbl_user.email='$sess' AND tbl_desain_produk_user.no_invoice='NULL'";
                                $querytblberita = @mysqli_query($koneksidb, $sqltblberita);
                                while ($result = @mysqli_fetch_array($querytblberita)) {
                                ?>
                                    <tr>
                                        <td>
                                            <figure class="itemside">
                                                <div class="aside"><img src="imagedesainuser/<?php echo htmlentities($result['gambar_depan']); ?>" style="max-width: 120px; max-height: 100px;" class="img-sm"></div>
                                                <figcaption class="info">
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <figure class="itemside">
                                                <div class="aside"><img src="imagedesainuser/<?php echo htmlentities($result['gambar_belakang']); ?>" style="max-width: 120px; max-height: 100px;" class="img-sm"></div>
                                            </figure>
                                        </td>
                                        <td>
                                            <figure class="itemside">
                                                <figcaption class="info">
                                                    <a href="#" class="title text-dark"><?php echo htmlentities($result['nama_order']); ?></a>
                                                    <p class="text-muted small">Jenis: <?php echo htmlentities($result['jenis_kaos']); ?>, Warna: <?php echo htmlentities($result['warna_kaos']); ?>, <br>Nama Produk: <?php echo htmlentities($result['nama_produk']); ?></p>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <figure class="itemside">
                                                <figcaption class="info">
                                                    <p class="text-muted small">Size S: <?php echo htmlentities($result['ukuran_s']); ?>,<br>Size M: <?php echo htmlentities($result['ukuran_m']); ?>,<br>Size L: <?php echo htmlentities($result['ukuran_l']); ?>,<br>Size XL: <?php echo htmlentities($result['ukuran_xl']); ?>,</p>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <?php
                                            $harga = ($result['ukuran_s'] + $result['ukuran_m'] + $result['ukuran_l'] + $result['ukuran_xl']) * $result['harga_produk'];
                                            ?>
                                            <div class="price-wrap">
                                                <var class="price" id="harga"><?php echo "Rp" . number_format($harga, 0, ",", "."); ?></var>
                                            </div> <!-- price-wrap .// -->
                                        </td>
                                        <td class="text-right">
                                            <a href="detaildesainprodukuser?id=<?php echo htmlentities($result['id_desain_produk_user']); ?>" class="btn btn-success"> Detail</a>
                                            <a href="action/hapusdesainprodukuser?id=<?php echo htmlentities($result['id_desain_produk_user']); ?>" onclick="return confirm('Apakah anda yakin akan menghapus desain judul <?php echo $result['nama_order']; ?>?');" class="btn btn-danger"> Remove</a>
                                        </td>
                                    </tr>

                                <?php
                                    array_push($arraytotal, $harga);
                                }
                                $totalharga = array_sum($arraytotal);
                                ?>

                            </tbody>
                        </table>
                        <div class="card-body border-top">
                            <?php if ($totalharga > 0) {  ?>
                                <a href="checkout" class="btn btn-primary float-md-right"> Checkout <i class="fa fa-chevron-right"></i> </a>
                            <?php }

                            ?>

                            <a href="masukkeranjang" class="btn btn-primary"> <i class="fa fa-chevron-left"></i> Tambah Desain </a>
                        </div>
                    </div> <!-- card.// -->
                </main> <!-- col.// -->
                <aside class="col-md-2">
                    <div class="card">
                        <div class="card-body">

                            <dl class="dlist-align">
                                <dt>Total Harga:</dt>
                                <dd class="text-right  h5" id="totalharga"><strong><?php echo "Rp" . number_format($totalharga, 0, ",", "."); ?></strong></dd>
                            </dl>



                        </div> <!-- card-body.// -->
                    </div> <!-- card .// -->
                </aside> <!-- col.// -->
            </div>
        </div>

    </section><!-- End Hero -->

<?php
    include('includes/footer.php');
}
?>