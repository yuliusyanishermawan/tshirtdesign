<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['user']) == 0) {
    header('location:login.php');
} else {
    $title = 'Kritik dan Saran';
    include('includes/config.php');
    include('includes/header.php');
    $sess = $_SESSION['user'];
?>
    <!-- ======= Hero Section ======= -->
    <section id="faq" class="d-flex align-items-center faq">

        <div class="container-fluid col-11" data-aos="fade-up">
            <div class="section-title">
                <h2>Kritik dan Saran</h2>
            </div>
            <div class="row justify-content-center">
                <main class="col-10">
                    <div class="card">
                        <table class="table table-borderless table-shopping-cart" id="table">
                            <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col" style="width: 10px;" class="text-center">No</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Pertanyaan</th>
                                    <th scope="col">Jawaban</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                $sqltblberita = "SELECT * FROM tbl_kritiksaran WHERE email='$sess'";
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
                                                    <p class="text-dark"><?php echo htmlentities($result['jenis']); ?></p>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <figure class="itemside">
                                                <figcaption class="info">
                                                    <p class="text-muted text-break"><?php echo htmlentities($result['isi']); ?></p>
                                                </figcaption>
                                            </figure>
                                        </td>

                                        <td>
                                            <figure class="itemside">
                                                <figcaption class="info">
                                                    <p class="text-muted text-break"><?php echo htmlentities($result['balasan']); ?></p>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <figure class="itemside">
                                                <figcaption class="info">
                                                    <p class="text-muted"><?php
                                                                            if ($result['balasan'] == NULL) {
                                                                                echo "<a class='btn btn-success'>Belum Terbalas</a>";
                                                                            } else {
                                                                                echo "<a class='btn btn-success'>Terbalas</a>";
                                                                            }
                                                                            ?></p>
                                                </figcaption>
                                            </figure>
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