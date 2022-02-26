<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['user']) == 0) {
    header('location:login.php');
} else {
    $title = "Detail Riwayat Pesanan";
    include('includes/config.php');
    include('includes/header.php');
    include('includes/uploadview.php');
?>
    <!-- ======= Hero Section ======= -->
    <section id="faq" class="d-flex align-items-center faq">

        <div class="container-fluid col-11" data-aos="fade-up">
            <div class="section-title">
                <h2>Detail Riwayat Pesanan</h2>
            </div>
            <div class="row justify-content-center">
                <main class="col-md-9">
                    <div class="card card-body">
                        <dl class="dlist-align text-center">
                            <dt>Data Pengiriman</dt>
                        </dl>
                        <form method="POST" method="POST" action="action/masukkeranjangact" enctype="multipart/form-data">
                            <div class="form-group">
                                <?php
                                $id = $_GET['id'];
                                $sql = "SELECT * FROM tbl_order INNER JOIN  tbl_user ON tbl_order.id_user=tbl_user.id_user INNER JOIN tbl_desain_produk_user ON tbl_desain_produk_user.no_invoice=tbl_order.no_invoice WHERE tbl_order.no_invoice='$id'";
                                $query = mysqli_query($koneksidb, $sql);
                                $result = mysqli_fetch_array($query);
                                ?>
                                <label for="firstName">No Invoice</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Input nama desain..." value="<?php echo htmlentities($result['no_invoice']); ?>" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="firstName">Nama User</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Input nama desain..." value="<?php echo htmlentities($result['nama_lengkap']); ?>" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="firstName">Email</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Input nama desain..." value="<?php echo htmlentities($result['email']); ?>" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="firstName">Nomor Telfon</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Input nama desain..." value="<?php echo htmlentities($result['nomor']); ?>" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="firstName">Alamat</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Input Alamat" required name="alamat" disabled><?php echo htmlentities($result['alamat_pengiriman']); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="state" class="form-label">Provinsi</label>
                                <select class="form-control" id="nama_produk" required disabled>
                                    <option disabled selected hidden><?php echo htmlentities($result['provinsi']); ?></option>
                                </select>
                                <input type="text" name="provinsi" hidden>
                                <div class="invalid-feedback">
                                    Pilih Provinsi
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="form-label">Kota/Kabupaten</label>
                                <select class="form-control" id="nama_produk" required disabled>
                                    <option value='' disabled selected hidden><?php echo htmlentities($result['kota']); ?></option>
                                </select>
                                <div class="invalid-feedback">
                                    Pilih Distrik
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="firstName">Kode Pos</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Input nama desain..." value="<?php echo htmlentities($result['kodepos']); ?>" required disabled>
                            </div>

                            <div class="form-group">
                                <label for="state" class="form-label">Ekspedisi</label>
                                <select class="form-control" id="nama_produk" required disabled>
                                    <option value='' disabled selected hidden><?php echo htmlentities($result['ekspedisi']); ?></option>
                                    <div class="invalid-feedback">
                                        Pilih Expedisi
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="form-label">Jenis Paket</label>
                                <select class="form-control" id="nama_produk" required name="nama_paket">
                                    <option value='' disabled selected hidden>Pilih Paket</option>
                                </select>
                                <input type="text" name="ongkir" id="ongkir" hidden>
                                <input type="text" name="estimasi" hidden>
                                <input type="text" name="paket" hidden>
                                <div class="invalid-feedback">
                                    Pilih Paket
                                </div>
                            </div>

                            <?php
                            $status = $result['status'];

                            $bukti = $result['bukti'];
                            $resi_pengiriman = $result['resi_pengiriman'];
                            ?>
                            <?php
                            $id_user = $result["id_user"];
                            $sql = "SELECT (SUM(ukuran_s)+SUM(ukuran_m)+SUM(ukuran_l)+SUM(ukuran_xl)) AS totalukuran FROM tbl_desain_produk_user INNER JOIN tbl_user ON tbl_desain_produk_user.id_user=tbl_user.id_user WHERE tbl_desain_produk_user.no_invoice='$id'";
                            $query = mysqli_query($koneksidb, $sql);
                            $resulttt = mysqli_fetch_array($query);
                            $totalberatkaos = $resulttt['totalukuran'] * 200;
                            ?>
                            <div class="form-group">
                                <label for="firstName">Total Berat</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Input nama desain..." value="<?php echo $totalberatkaos . " Gram"; ?>" required name="total_beratt" disabled>
                                <input type="number" class="form-control" id="firstName" placeholder="Input nama desain..." value="<?php echo $totalberatkaos; ?>" required name="total_berat" hidden>
                            </div>
                            <div class="form-group">
                                <label for="firstName">Status</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Input nama desain..." value="<?php echo $status ?>" required disabled>
                            </div>

                            <?php
                            if ($status == "Pesanan Selesai" and $resi_pengiriman == "Pickup") {
                                echo '<div class="form-group">
                                <label for="firstName">Info</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Input nama desain..." value="Pesanan Bisa Diambil Di Toko" required disabled>
                            </div>';
                            } elseif ($status == "Pesanan Selesai") {
                                echo '<div class="form-group">
                                <label for="firstName">Nomer Resi Pengiriman</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Input nama desain..." value="';
                                echo $resi_pengiriman;
                                echo '" required disabled>
                            </div>';
                            };






                            if ($status != "Menunggu Pembayaran") {
                                echo '<div class="form-group">
                                <p>Upload Bukti Pembayaran</p>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="input" accept="image/*" required name="bukti" onchange="changelabel1();" aria-describedby="inputGroupFileAddon01" disabled>
                                        <label class="custom-file-label" for="input" id="label">';
                                echo $bukti;
                                echo '</label>
                                    </div>
                                </div>
                            </div>';
                                echo '<div class="form-row "><div class="form-group">
                                <label for="inputCity">Bukti Transfer</label><br>
                                        <img style="max-width: 500px; max-height: 500px; border:none;" src="bukti/';
                                echo $bukti;
                                echo '" alt="">
                                     </div> 
                                    </div>';
                            } else {
                                echo '<div class="form-group">
                                <p>Upload Bukti Pembayaran</p>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="input" accept="image/*" required name="bukti" onchange="changelabel1();" aria-describedby="inputGroupFileAddon01" disabled >
                                        <label class="custom-file-label" for="input" id="label">Harap Kirim Bukti Transfer</label>
                                    </div>
                                </div>
                            </div>';
                            };
                            ?>
                            <hr class="mb-3">
                            <dl class="dlist-align text-center">
                                <dt>Detail Item Pembelian</dt>
                            </dl>
                            <hr class="mb-3">
                            <table class="table table-borderless table-shopping-cart" id="table">
                                <thead class="text-muted">
                                    <tr class="small text-uppercase">
                                        <th scope="col">Gambar Depan</th>
                                        <th scope="col">Gambar Belakang</th>
                                        <th scope="col" class=" text-center">Rincian</th>
                                        <th scope="col" width="120">Banyak</th>
                                        <th scope="col" class="text-center" width="20">Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sess = $_SESSION['user'];
                                    $arraytotal = [];
                                    $nomor = 0;
                                    $sqltblberita = "SELECT * FROM tbl_desain_produk_user INNER JOIN tbl_produk ON tbl_desain_produk_user.id_produk=tbl_produk.id_produk INNER JOIN tbl_user ON tbl_desain_produk_user.id_user=tbl_user.id_user WHERE tbl_desain_produk_user.no_invoice='$id'";
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
                                        </tr>
                                        <input type="number" name="id_desain_produk_user[]" value="<?php echo htmlentities($result['id_desain_produk_user']); ?>" hidden>
                                        <input type="number" name="harga[]" value="<?php echo htmlentities($harga); ?>" hidden>

                                    <?php
                                        array_push($arraytotal, $harga);
                                    }
                                    $totalharga = array_sum($arraytotal);
                                    ?>

                                </tbody>
                            </table>


                            <a type="button" class="btn btn-primary btn-lg btn-block" href="invoice?id=<?php echo $id; ?>">Cetak Invoice</a>

                            <a type="button" class="btn btn-primary btn-lg btn-block" href="riwayatpesanan.php">Kembali</a>
                    </div> <!-- card.// -->
                </main> <!-- col.// -->
                <aside class="col-md-2">
                    <div class="card">
                        <div class="card-body">
                            <dl class="dlist-align text-center">
                                <dt>Detail Harga Desain</dt>
                            </dl>
                            <?php
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM tbl_order INNER JOIN  tbl_user ON tbl_order.id_user=tbl_user.id_user INNER JOIN tbl_desain_produk_user ON tbl_desain_produk_user.no_invoice=tbl_order.no_invoice WHERE tbl_order.no_invoice='$id'";
                            $query = mysqli_query($koneksidb, $sql);
                            $result = mysqli_fetch_array($query);
                            ?>
                            <div class="form-group">
                                <label for="firstName">Total Ongkir</label></label>
                                <input type="text" class="form-control" id="totalhargaaa" placeholder="0" required name="totalhargaaa" readonly hidden>
                                <input type="text" class="form-control" id="totalhargaa" placeholder="0" required name="totalhargaa" value="<?php echo "Rp " . number_format($result['biaya_ongkir'], 0, ",", "."); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="firstName">Total Biaya</label></label>
                                <input type="text" class="form-control" id="totalhargaaa" placeholder="0" required name="totalhargaaa" readonly hidden>
                                <input type="text" class="form-control" id="totalhargaa" placeholder="0" required name="totalhargaa" value="<?php echo "Rp " . number_format($result['total_biaya'], 0, ",", "."); ?>" readonly>
                            </div>
                            </form>
                        </div> <!-- card-body.// -->
                    </div> <!-- card .// -->
            </div>
            </aside> <!-- col.// -->

        </div>
        </div>

    </section><!-- End Hero -->
    <script type="text/javascript">
        Number.prototype.format = function(n, x) {
            var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
            return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
        };
        document.getElementById('hargakaosss').value = <?php echo $totalharga ?>;
        document.getElementById('hargakaoss').value = "Rp " + <?php echo $totalharga . '.'; ?>.format() + ",00";
        document.getElementById('totalhargaaa').value = <?php echo $totalharga ?>;
        document.getElementById('totalhargaa').value = "Rp " + <?php echo $totalharga . '.'; ?>.format() + ",00";
    </script>
<?php
    include('includes/footer.php');
}
?>