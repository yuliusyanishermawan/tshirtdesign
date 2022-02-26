<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $title = "Dikerjakan";
  include('includes/header.php');
  include('includes/sidebar.php');
  include('includes/config.php');
?>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Desain User Offline</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php
            $id = $_GET['id'];
            ?>
            <form method="post" action="action/dikerjakandatauserdesaintambahact.php" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Order</label>
                  <input type="text" class="form-control" id="firstName" placeholder="Input Nama Desain" name="nama_desain" required>
                  <input type="text" class="form-control" name="id_user" value="<?php echo htmlentities($id); ?>" placeholder="Nama User..." required hidden>
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
                    <input type="number" class="form-control" id="s" placeholder="Input ukuran S" name="ukuran_s" value="0" required OnMouseOver="sum();sumtotal();" OnMouseOut="sum();sumtotal();" onkeyup="sum();sumtotal();">
                  </div>
                  <div class="form-group col-md-3 mb-3">
                    <label for="floatingInput">Size M</label>
                    <input type="number" class="form-control" id="m" placeholder="Input ukuran M" name="ukuran_m" value="0" required OnMouseOver="sum();sumtotal();" OnMouseOut="sum();sumtotal();" onkeyup="sum();sumtotal();">
                  </div>
                  <div class="form-group col-md-3 mb-3">
                    <label for="floatingInput">Size L</label>
                    <input type="number" class="form-control" id="l" placeholder="Input ukuran L" name="ukuran_l" value="0" required OnMouseOver="sum();sumtotal();" OnMouseOut="sum();sumtotal();" onkeyup="sum();sumtotal();">
                  </div>
                  <div class="form-group col-md-3 mb-3">
                    <label for="floatingInput">Size XL</label>
                    <input type="number" class="form-control" id="xl" placeholder="Input ukuran XL" name="ukuran_xl" value="0" required OnMouseOver="sum();sumtotal();" OnMouseOut="sum();sumtotal();" onkeyup="sum();sumtotal();">
                  </div>
                </div>


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
                <div class="form-group">
                  <label for="zip">Harga Satuan</label>
                  <input type="text" class="form-control" id="hargasatuanview" placeholder="0" required readonly>
                  <input type="number" class="form-control" id="hargasatuan" placeholder="0" required hidden>
                </div>
                <div class="form-group">
                  <label for="zip">Jumlah Kaos</label>
                  <input type="number" class="form-control" id="banyakkaos" placeholder="0" required readonly>
                </div>
                <div class="form-group">
                  <label for="zip">Total Harga (Rp)</label>
                  <input type="text" class="form-control" id="totalhargaview" name="totalharga" placeholder="0" required readonly>
                  <input type="number" class="form-control" id="totalharga" name="totalharga" placeholder="0" required hidden>
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
          <!-- Input addon -->
        </div>
        <div class="form-group">
        </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!--/.col (right) -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <script type="text/javascript">
    <?php echo $jsArray; ?>

    function changeValue(nama_produk) {
      document.getElementById('hargasatuan').value = produk[nama_produk].harga_produk;
      document.getElementById('hargasatuanview').value = "Rp " + document.getElementById('hargasatuan').value;
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