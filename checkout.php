<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['user']) == 0) {
    header('location:login.php');
} else {
    $title = "Checkout";
    include('includes/config.php');
    include('includes/header.php');
    $sess = $_SESSION['user'];
?>
    <!-- ======= Hero Section ======= -->
    <section id="faq" class="d-flex align-items-center faq">

        <div class="container-fluid col-11" data-aos="fade-up">
            <div class="section-title">
                <h2>Checkout</h2>
            </div>
            <div class="row justify-content-center">
                <main class="col-md-9">
                    <div class="card card-body">
                        <dl class="dlist-align text-center">
                            <dt>Input Data Pengiriman</dt>
                        </dl>
                        <form class="needs-validation" method="POST" action="action/checkoutact" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="firstName">Nama User</label>
                                <?php
                                $sql = "SELECT * FROM tbl_user WHERE email='$sess'";
                                $query = mysqli_query($koneksidb, $sql);
                                $result = mysqli_fetch_array($query);
                                ?>
                                <input type="text" class="form-control" id="firstName" placeholder="Input nama desain..." value="<?php echo htmlentities($result['nama_lengkap']); ?>" required disabled>
                                <input type="number" class="form-control" id="firstName" placeholder="Input nama desain..." value="<?php echo htmlentities($result['id_user']); ?>" name="id_user" required hidden>
                            </div>
                            <div class="form-group">
                                <label for="firstName">Email</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Input nama desain..." value="<?php echo htmlentities($result['email']); ?>" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="firstName">Nomor Telfon</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Input nama desain..." value="<?php echo htmlentities($result['nomor']); ?>" required disabled>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="firstName">Alamat</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Input Alamat" value="<?php echo htmlentities($result['alamat']); ?>" required name="alamat"><?php echo htmlentities($result['alamat']); ?></textarea>
                            </div>



                            <div class="form-group">
                                <label for="state" class="form-label">Provinsi</label>
                                <select class="form-control" id="nama_provinsi" required name="nama_provinsi">
                                    <option value='' disabled selected hidden>Pilih Provinsi</option>
                                </select>
                                <small id="emailHelp" class="form-text text-muted">Jika pesanan diambil sendiri ditoko silahkan pilih pickup.</small>
                                <input type="text" name="provinsi" id="provinsi" hidden>
                                <div class="invalid-feedback">
                                    Pilih Provinsi
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="state" class="form-label">Kota/Kabupaten</label>
                                <select class="form-control" id="nama_produk" required name="nama_distrik">
                                    <option value='' disabled selected hidden>Pilih Kota/Kabupaten</option>
                                </select>
                                <small id="emailHelp" class="form-text text-muted">Jika pesanan diambil sendiri ditoko silahkan pilih pickup.</small>
                                <input type="text" name="distrik" hidden>
                                <input type="text" name="kodepos" hidden>
                                <div class="invalid-feedback">
                                    Pilih Distrik
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="form-label">Ekspedisi</label>
                                <select class="form-control" id="nama_produk" required name="nama_ekspedisi"></select>
                                <small id="emailHelp" class="form-text text-muted">Jika pesanan diambil sendiri ditoko silahkan pilih pickup.</small>
                                <input type="text" name="ekspedisi" hidden>
                                <div class="invalid-feedback">
                                    Pilih Expedisi
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="form-label">Jenis Paket</label>
                                <select class="form-control" id="nama_produk" required name="nama_paket">
                                    <option value='' disabled selected hidden>Pilih Paket</option>
                                </select>
                                <small id="emailHelp" class="form-text text-muted">Jika pesanan diambil sendiri ditoko silahkan pilih pickup.</small>
                                <input type="text" name="ongkir" id="ongkir" hidden>
                                <input type="text" name="estimasi" hidden>
                                <input type="text" name="paket" hidden>
                                <div class="invalid-feedback">
                                    Pilih Paket
                                </div>
                            </div>
                            <?php
                            $id_user = $result["id_user"];
                            $sql = "SELECT (SUM(ukuran_s)+SUM(ukuran_m)+SUM(ukuran_l)+SUM(ukuran_xl)) AS totalukuran FROM tbl_desain_produk_user INNER JOIN tbl_user ON tbl_desain_produk_user.id_user=tbl_user.id_user WHERE tbl_desain_produk_user.no_invoice='NULL' AND tbl_desain_produk_user.id_user='$id_user'";
                            $query = mysqli_query($koneksidb, $sql);
                            $result = mysqli_fetch_array($query);
                            $totalberatkaos = $result['totalukuran'] * 200;
                            ?>
                            <div class="form-group">
                                <label for="firstName">Total Berat</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Input nama desain..." value="<?php echo $totalberatkaos . " Gram"; ?>" required name="total_beratt" readonly>
                                <input type="number" class="form-control" id="firstName" placeholder="Input nama desain..." value="<?php echo $totalberatkaos; ?>" required name="total_berat" hidden>
                            </div>
                            <hr class="form-group">
                            <dl class="dlist-align text-center">
                                <dt>Detail Item Pembelian</dt>
                            </dl>
                            <hr class="form-group">
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
                                                    <var class="price" id="harga"><?php echo "Rp" . number_format($harga, 2, ",", "."); ?></var>
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
                            </table><button class="btn btn-primary btn-lg btn-block" type="submit">Order</button>
                    </div> <!-- card.// -->
                </main> <!-- col.// -->
                <aside class="col-md-2">
                    <div class="card">
                        <div class="card-body">
                            <dl class="dlist-align text-center">
                                <dt>Detail Harga Desain</dt>
                            </dl>
                            <?php
                            $sql = "SELECT max(no_invoice) as kodeorderterbesar FROM tbl_order";
                            $query = mysqli_query($koneksidb, $sql);
                            $data = mysqli_fetch_array($query);
                            $kodeorder = $data['kodeorderterbesar'];
                            $urutan = (int) substr($kodeorder, 3, 7);
                            $urutan++;
                            $huruf = "TRX";
                            $kodeorder = $huruf . sprintf("%07s", $urutan);
                            ?>
                            <div class="form-group">
                                <label for="zip">Harga Kaos</label>
                                <input type="text" class="form-control" id="hargakaosss" placeholder="0" required name="hargakaoss" readonly hidden>
                                <input type="text" class="form-control" id="hargakaoss" placeholder="0" required name="hargakaoss" readonly>
                                <input type="text" name="kode_order" required="required" value="<?php echo $kodeorder ?>" hidden>
                            </div>
                            <div class="form-group">
                                <label for="zip">Ongkir</label>
                                <input type="number" class="form-control" id="totalongkirr" placeholder="0" required disabled hidden>
                                <input type="text" class="form-control" id="totalongkir" placeholder="0" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="zip">Total Harga (Rp)</label>
                                <input type="text" class="form-control" id="totalhargaaa" placeholder="0" required name="totalhargaaa" readonly hidden>
                                <input type="text" class="form-control" id="totalhargaa" placeholder="0" required name="totalhargaa" readonly>
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


    <script>
        $(document).ready(function() {
            $.ajax({
                type: 'post',
                url: 'includes/ongkir/dataprovinsi.php',
                success: function(hasil_provinsi) {
                    $("select[name=nama_provinsi]").html(hasil_provinsi);
                }
            });

            $("select[name=nama_provinsi]").on("change", function() {
                // Ambil id_provinsi ynag dipilih (dari atribut pribadi)
                var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
                $.ajax({
                    type: 'post',
                    url: 'includes/ongkir/datadistrik.php',
                    data: 'id_provinsi=' + id_provinsi_terpilih,
                    success: function(hasil_distrik) {
                        $("select[name=nama_distrik]").html(hasil_distrik);
                    }
                })
            });

            $.ajax({
                type: 'post',
                url: 'includes/ongkir/jasaekspedisi.php',
                success: function(hasil_ekspedisi) {
                    $("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
                }
            });

            $("select[name=nama_ekspedisi]").on("change", function() {
                // Mendapatkan data ongkos kirim

                // Mendapatkan ekspedisi yang dipilih
                var ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();
                // Mendapatkan id_distrik yang dipilih
                var distrik_terpilih = $("option:selected", "select[name=nama_distrik]").attr("id_distrik");
                // Mendapatkan toatal berat dari inputan
                $total_berat = $("input[name=total_berat]").val();
                $.ajax({
                    type: 'post',
                    url: 'includes/ongkir/datapaket.php',
                    data: 'ekspedisi=' + ekspedisi_terpilih + '&distrik=' + distrik_terpilih + '&berat=' + $total_berat,
                    success: function(hasil_paket) {
                        // console.log(hasil_paket);
                        $("select[name=nama_paket]").html(hasil_paket);

                        // Meletakkan nama ekspedisi terpilih di input ekspedisi
                        $("input[name=ekspedisi]").val(ekspedisi_terpilih);
                    }
                })
            });

            $("select[name=nama_distrik]").on("change", function() {
                var prov = $("option:selected", this).attr('nama_provinsi');
                var dist = $("option:selected", this).attr('nama_distrik');
                var tipe = $("option:selected", this).attr('tipe_distrik');
                var kodepos = $("option:selected", this).attr('kodepos');

                $("input[name=provinsi]").val(prov);
                $("input[name=distrik]").val(dist);
                $("input[name=tipe]").val(tipe);
                $("input[name=kodepos]").val(kodepos);
            });

            $("select[name=nama_paket]").on("change", function() {
                var paket = $("option:selected", this).attr("paket");
                var ongkir = $("option:selected", this).attr("ongkir");
                var etd = $("option:selected", this).attr("etd");

                $("input[name=paket]").val(paket);
                $("input[name=ongkir]").val(ongkir);
                $("input[name=estimasi]").val(etd);

                Number.prototype.format = function(n, x) {
                    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
                    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
                };

                var nama_pro = document.getElementById('nama_provinsi').value;
                if (nama_pro != "Pickup") {
                    var ongkir = document.getElementById('ongkir').value;
                    document.getElementById('totalongkirr').value = ongkir;
                    document.getElementById('totalongkir').value = "Rp " + ongkir + ",00";
                    document.getElementById('totalhargaaa').value = parseInt(<?php echo $totalharga; ?>) + parseInt(ongkir);
                    document.getElementById('totalhargaa').value = "Rp " + document.getElementById('totalhargaaa').value + ",00";
                };

            })
        });
    </script>
<?php
    include('includes/footer.php');
}
