<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['user']) == 0) {
    header('location:login.php');
} else {
    $title = 'Detail Desain Produk User';
    include('includes/config.php');
    include('includes/header.php');
    include('includes/uploadview.php');
    $sess = $_SESSION['user'];
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_desain_produk_user INNER JOIN tbl_produk ON tbl_desain_produk_user.id_produk=tbl_produk.id_produk INNER JOIN tbl_user ON tbl_desain_produk_user.id_user=tbl_user.id_user WHERE tbl_desain_produk_user.id_desain_produk_user='$id'";
    $query = mysqli_query($koneksidb, $sql);
    $result = mysqli_fetch_array($query);
    $totalkaos = $result['ukuran_s'] + $result['ukuran_m'] + $result['ukuran_l'] + $result['ukuran_xl'];
?>
    <!-- ======= Hero Section ======= -->
    <section id="faq" class="d-flex align-items-center faq">

        <div class="container-fluid col-11" data-aos="fade-up">
            <div class="section-title">
                <h2>Keranjang</h2>
            </div>
            <div class="row justify-content-center">
                <main class="col-md-8">
                    <div class="card card-body">
                        <dl class="dlist-align text-center">
                            <dt>Input Data Desain Produk User</dt>
                        </dl>
                        <form class="needs-validation" method="POST" action="action/ubahukuran" enctype="multipart/form-data">
                            <div class="form-group">

                                <label for="floatingInput">Nama Desain</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Input nama desain..." value="<?php echo htmlentities($result['nama_order']); ?>" name="nama_desain" required disabled>
                                <input type="number" class="form-control" id="firstName" placeholder="Input nama desain..." value="<?php echo htmlentities($result['id_desain_produk_user']); ?>" name="id_desain_produk_user" required hidden>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Nama Produk</label>
                                <select class="form-control" onchange="changeValue(this.value)" id="nama_produk" required name="nama_produk" disabled>
                                    <option value="<?php echo htmlentities($result['nama_produk']); ?>" selected><?php echo htmlentities($result['nama_produk']); ?></option>
                                    <?php
                                    $jsArray .= "produk['" . $result['nama_produk'] . "'] = {harga_produk:'" . addslashes($result['harga_produk']) . "'};\n";
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="firstName">Jenis Kaos</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Input nama desain..." value="<?php echo htmlentities($result['jenis_kaos']); ?>" name="nama_desain" required disabled>
                                <div class="invalid-feedback">
                                    Input Nama Desain.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="firstName">Warna Kaos</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Input nama desain..." value="<?php echo htmlentities($result['warna_kaos']); ?>" name="nama_desain" required disabled>
                                <div class="invalid-feedback">
                                    Input Nama Desain.
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 mb-3">
                                    <label for="floatingInput">Size S</label>
                                    <input type="text" class="form-control" id="s" placeholder="Input ukuran S" name="ukuran_s" value="<?php echo htmlentities($result['ukuran_s']); ?>" required OnMouseOver="sum();sumtotal();" OnMouseOut="sum();sumtotal();" onkeyup="sum();sumtotal();">
                                </div>
                                <div class="form-group col-md-3 mb-3">
                                    <label for="floatingInput">Size M</label>
                                    <input type="number" class="form-control" id="m" placeholder="Input ukuran M" name="ukuran_m" value="<?php echo htmlentities($result['ukuran_m']); ?>" required OnMouseOver="sum();sumtotal();" OnMouseOut="sum();sumtotal();" onkeyup="sum();sumtotal();">
                                </div>
                                <div class="form-group col-md-3 mb-3">
                                    <label for="floatingInput">Size L</label>
                                    <input type="number" class="form-control" id="l" placeholder="Input ukuran L" name="ukuran_l" value="<?php echo htmlentities($result['ukuran_l']); ?>" required OnMouseOver="sum();sumtotal();" OnMouseOut="sum();sumtotal();" onkeyup="sum();sumtotal();">
                                </div>
                                <div class="form-group col-md-3 mb-3">
                                    <label for="floatingInput">Size XL</label>
                                    <input type="number" class="form-control" id="xl" placeholder="Input ukuran XL" name="ukuran_xl" value="<?php echo htmlentities($result['ukuran_xl']); ?>" required OnMouseOver="sum();sumtotal();" OnMouseOut="sum();sumtotal();" onkeyup="sum();sumtotal();">
                                </div>
                            </div>
                            <hr>



                            <button class="btn btn-primary btn-lg btn-block" type="submit">Ubah Jumlah Ukuran</button>
                        </form>
                        <div class="card-body border-top">
                            <?php if ($totalharga > 0) {  ?>
                                <a href="checkout" class="btn btn-primary float-md-right"> Checkout <i class="fa fa-chevron-right"></i> </a>
                            <?php }

                            ?>

                        </div>
                    </div> <!-- card.// -->
                </main> <!-- col.// -->
                <aside class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="d-flex justify-content-between align-items-centers mb-3">
                                <span class="text-primary">View Gambar</span>
                            </h5>

                            <div class="container">
                                <div class="row">

                                    <div class="col-sm">
                                        <h6 class="d-flex align-items-centers mb-3">
                                            <span class="text-primary">Gambar Depan</span>
                                        </h6>
                                        <a href="imagedesainuser/<?php echo htmlentities($result['gambar_depan']); ?>"><img id='img-uploaddepan' src="imagedesainuser/<?php echo htmlentities($result['gambar_depan']); ?>"></a>
                                    </div>
                                    <div class="col-sm">
                                        <h6 class="d-flex align-items-centers mb-3">
                                            <span class="text-primary">Gambar Belakang</span>
                                        </h6>
                                        <a href="imagedesainuser/<?php echo htmlentities($result['gambar_belakang']); ?>"><img id='img-uploadbelakang' src="imagedesainuser/<?php echo htmlentities($result['gambar_belakang']); ?>"></a>
                                    </div>

                                </div>
                            </div>

                            <br>
                            <h5 class="d-flex justify-content-between align-items-centers mb-3">
                                <span class="text-primary">Detail Harga Desain</span>
                            </h5>

                            <form class="card p-2">
                                <div class="form-group">
                                    <label for="zip">Harga Satuan</label>
                                    <input type="text" class="form-control" placeholder="0" value="<?php echo "Rp " . number_format($result['harga_produk'], 0, ",", "."); ?>" required disabled>
                                    <input type="number" class="form-control" id="hargasatuan" placeholder="0" value="<?php echo htmlentities($result['harga_produk']); ?>" required hidden>
                                </div>
                                <div class="form-group">
                                    <label for="zip">Jumlah Kaos</label>
                                    <input type="number" class="form-control" id="banyakkaos" placeholder="0" value="<?php echo $totalkaos; ?>" required disabled>
                                </div>
                                <div class="form-group">
                                    <label for="zip">Total Harga (Rp)</label>
                                    <input type="text" class="form-control" id="totalhargaview" placeholder="0" required disabled>
                                    <input type="number" class="form-control" id="totalharga" placeholder="0" name="totalharga" required hidden>
                                </div>
                            </form>
                        </div> <!-- card-body.// -->
                    </div> <!-- card .// -->
                </aside> <!-- col.// -->
            </div>
        </div>

    </section><!-- End Hero -->

    <script type="text/javascript">
        <?php echo $jsArray; ?>

        function changeValue(nama_produk) {
            document.getElementById('hargasatuan').value = produk[nama_produk].harga_produk;
        };
    </script>
    <script type="text/javascript">
        function changelabel1() {
            document.getElementById("changelabel1").innerHTML = document.getElementById('image-source').files[0].name;;
        }

        function previewImage() {
            document.getElementById("img-uploaddepan").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("img-uploaddepan").src = oFREvent.target.result;
            };
        };
    </script>
    <script type="text/javascript">
        document.getElementById('totalharga').value = document.getElementById('hargasatuan').value * document.getElementById('banyakkaos').value;
        document.getElementById('totalhargaview').value = "Rp " + document.getElementById('totalharga').value;

        function changelabel2() {
            document.getElementById("changelabel2").innerHTML = document.getElementById('image-source1').files[0].name;;
        }

        function previewImage1() {
            document.getElementById("img-uploadbelakang").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image-source1").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("img-uploadbelakang").src = oFREvent.target.result;
            };
        };
    </script>
    <script>
        function sum() {
            var s = document.getElementById('s').value;
            var m = document.getElementById('m').value;
            var l = document.getElementById('l').value;
            var xl = document.getElementById('xl').value;
            // var harga_satuan = document.getElementById('hargasatuan').value = produk[nama_produk].harga_produk;


            var result = parseInt(s) + parseInt(m) + parseInt(l) + parseInt(xl);
            if (!isNaN(result)) {
                document.getElementById('banyakkaos').value = result;
            }

            // var totalharga = $result * harga_satuan;
            // document.getElementById('totalharga').value = totalharga;

        }

        function sumtotal() {
            var banyakkaos = document.getElementById('banyakkaos').value;
            var hargasatuan = document.getElementById('hargasatuan').value;

            var resulttotal = parseInt(banyakkaos) * parseInt(hargasatuan);
            document.getElementById('totalharga').value = resulttotal;
            document.getElementById('totalhargaview').value = "Rp " + document.getElementById('totalharga').value;

        }
    </script>

<?php
    include('includes/footer.php');
}
?>