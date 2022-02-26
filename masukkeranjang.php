<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['user']) == 0) {
    header('location:login.php');
} else {
    $title = 'Keranjang';
    include('includes/config.php');
    include('includes/header.php');
    include('includes/uploadview.php');
    $sess = $_SESSION['user'];
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
                        <form method="POST" action="action/masukkeranjangact" enctype="multipart/form-data">
                            <div class="form-group">
                                <?php
                                $sql = "SELECT * FROM tbl_user WHERE email='$sess'";
                                $query = mysqli_query($koneksidb, $sql);
                                $result = mysqli_fetch_array($query);
                                ?>
                                <label for="floatingInput">Nama Order</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Input Nama Desain" name="nama_desain" required>
                                <input type="number" class="form-control" id="firstName" placeholder="Input Nama Desain" value="<?php echo htmlentities($result['id_user']); ?>" name="id_user" required hidden>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Nama Produk</label>
                                <select class="form-control" onchange="changeValue(this.value)" id="nama_produk" required name="nama_produk">
                                    <?php
                                    $nomor = 0;
                                    $sqltblfaq = "SELECT * FROM tbl_produk";
                                    $querytblfaq = @mysqli_query($koneksidb, $sqltblfaq);
                                    $jsArray = "var produk = new Array();\n";
                                    while ($result = @mysqli_fetch_array($querytblfaq)) {
                                        $nomor++;
                                    ?>
                                        <option value="<?php echo htmlentities($result['nama_produk']); ?>"><?php echo htmlentities($result['nama_produk']); ?></option>

                                    <?php
                                        $jsArray .= "produk['" . $result['nama_produk'] . "'] = {harga_produk:'" . addslashes($result['harga_produk']) . "'};\n";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 mb-3">
                                    <label for="floatingInput">Size S</label>
                                    <input type="number" class="form-control" min="0" id="s" placeholder="Input ukuran S" name="ukuran_s" value="0" required OnMouseOver="sum();sumtotal();" OnMouseOut="sum();sumtotal();" onkeyup="sum();sumtotal();">
                                </div>
                                <div class="form-group col-md-3 mb-3">
                                    <label for="floatingInput">Size M</label>
                                    <input type="number" class="form-control" min="0" id="m" placeholder="Input ukuran M" name="ukuran_m" value="0" required OnMouseOver="sum();sumtotal();" OnMouseOut="sum();sumtotal();" onkeyup="sum();sumtotal();">
                                </div>
                                <div class="form-group col-md-3 mb-3">
                                    <label for="floatingInput">Size L</label>
                                    <input type="number" class="form-control" min="0" id="l" placeholder="Input ukuran L" name="ukuran_l" value="0" required OnMouseOver="sum();sumtotal();" OnMouseOut="sum();sumtotal();" onkeyup="sum();sumtotal();">
                                </div>
                                <div class="form-group col-md-3 mb-3">
                                    <label for="floatingInput">Size XL</label>
                                    <input type="number" class="form-control" min="0" id="xl" placeholder="Input ukuran XL" name="ukuran_xl" value="0" required OnMouseOver="sum();sumtotal();" OnMouseOut="sum();sumtotal();" onkeyup="sum();sumtotal();">
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <p>Gambar Depan</p>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" id="image-source" required name="gambar_depan" onchange="previewImage(); changelabel1();" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="image-source" id="changelabel1">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <p>Gambar Belakang</p>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" accept="image/*" id="image-source1" required name="gambar_belakang" onchange="previewImage1(); changelabel2();" aria-describedby="inputGroupFileAddon02">
                                            <label class="custom-file-label" for="image-source1" id="changelabel2">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <button class="btn btn-primary btn-lg btn-block" type="submit">Masukkan Ke Keranjang</button>
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
                                        <img id='img-uploaddepan'>
                                    </div>
                                    <div class="col-sm">
                                        <h6 class="d-flex align-items-centers mb-3">
                                            <span class="text-primary">Gambar Belakang</span>
                                        </h6>
                                        <img id='img-uploadbelakang'>
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
                                    <input type="text" class="form-control" id="hargasatuanview" placeholder="0" required readonly>
                                    <input type="number" class="form-control" id="hargasatuan" placeholder="0" required disabled hidden>
                                </div>
                                <div class="form-group">
                                    <label for="zip">Jumlah Kaos</label>
                                    <input type="number" class="form-control" id="banyakkaos" placeholder="0" required disabled>
                                </div>
                                <div class="form-group">
                                    <label for="zip">Total Harga (Rp)</label>
                                    <input type="text" class="form-control" id="totalhargaview" name="totalharga" placeholder="0" required disabled>
                                    <input type="number" class="form-control" id="totalharga" name="totalharga" placeholder="0" required hidden>
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
            document.getElementById('hargasatuanview').value = "Rp " + document.getElementById('hargasatuan').value;
        };
    </script>
    <script type="text/javascript">
        function changelabel1() {
            document.getElementById("changelabel1").innerHTML = document.getElementById('image-source').files[0].name;
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
        function changelabel2() {
            document.getElementById("changelabel2").innerHTML = document.getElementById('image-source1').files[0].name;
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