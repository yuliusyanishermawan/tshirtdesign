<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['user']) == 0) {
    header('location:login.php');
} else {
    $title = 'Riwayat Pesanan';
    include('includes/config.php');
    include('includes/header.php');
    $sess = $_SESSION['user'];
?>
    <!-- ======= Hero Section ======= -->
    <section id="faq" class="d-flex align-items-center faq">

        <div class="container-fluid col-11" data-aos="fade-up">
            <div class="section-title">
                <h2>Riwayat Pesanan</h2>
            </div>
            <div class="row justify-content-center">
                <main class="col-10">
                    <div class="card">
                        <table class="table table-borderless table-shopping-cart" id="table">
                            <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col" style="width: 10px;" class="text-center">No</th>
                                    <th scope="col">No Invoice</th>
                                    <th scope="col" style="width: 350px;">Alamat</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                $sqltblberita = "SELECT * FROM tbl_order INNER JOIN  tbl_user ON tbl_order.id_user=tbl_user.id_user WHERE tbl_user.email='$sess'";
                                $querytblberita = @mysqli_query($koneksidb, $sqltblberita);
                                while ($result = @mysqli_fetch_array($querytblberita)) {
                                ?>
                                    <tr>
                                        <td>
                                            <figure class="itemside">
                                                <figcaption class="info">
                                                    <p class="text-muted"><?php echo $nomor ?></p>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <figure class="itemside">
                                                <figcaption class="info">
                                                    <p class="text-dark"><?php echo htmlentities($result['no_invoice']); ?></p>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <figure class="itemside">
                                                <figcaption class="info">
                                                    <p class="text-muted text-break"><?php echo htmlentities($result['alamat_pengiriman']); ?></p>
                                                </figcaption>
                                            </figure>
                                        </td>

                                        <td>
                                            <figure class="itemside">
                                                <figcaption class="info">
                                                    <p class="text-muted" id="harga"><?php echo "Rp" . number_format($result['total_biaya'], 0, ",", "."); ?></p>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <figure class="itemside">
                                                <figcaption class="info">
                                                    <p class="text-muted"><?php
                                                                            if ($result['status'] == "Pesanan Selesai" and $result['resi_pengiriman'] == "Pickup") {
                                                                                echo "Pesanan Bisa Diambil";
                                                                            } elseif ($result['status'] == "Pesanan Selesai") {
                                                                                echo "Pesanan Sedang Dikirim";
                                                                            } else {
                                                                                echo htmlentities($result['status']);
                                                                            }
                                                                            ?></p>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <a href="detailriwayatpesanan?id=<?php echo htmlentities($result['no_invoice']); ?>" class="btn btn-success">Detail</a>
                                            <a href="editriwayatpesanan?id=<?php echo htmlentities($result['no_invoice']); ?>" class="btn btn-primary">Edit</a>
                                            <?php
                                            $noinvoice = $result['no_invoice'];
                                            if ($result['status'] == "Pesanan Selesai") {
                                                echo '<a href="editriwayatpesanan?id=';
                                                echo $noinvoice;
                                                echo '" class="btn btn-primary">Beri Ulasan</a>';
                                            }
                                            ?>

                                        </td>
                                    </tr>

                                <?php
                                    $nomor++;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div> <!-- card.// -->
                </main> <!-- col.// -->

            </div>
        </div>

    </section><!-- End Hero -->

<?php
    include('includes/footer.php');
}
?>