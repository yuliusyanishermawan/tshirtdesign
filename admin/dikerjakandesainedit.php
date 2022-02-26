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
  $id = $_GET['id'];
  $sql = "SELECT * FROM tbl_desain_produk_user INNER JOIN tbl_produk ON tbl_desain_produk_user.id_produk=tbl_produk.id_produk INNER JOIN tbl_user ON tbl_desain_produk_user.id_user=tbl_user.id_user WHERE tbl_desain_produk_user.id_desain_produk_user='$id'";
  $query = mysqli_query($koneksidb, $sql);
  $result = mysqli_fetch_array($query);
  $totalkaos = $result['ukuran_s'] + $result['ukuran_m'] + $result['ukuran_l'] + $result['ukuran_xl'];
?>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Desain User Offline</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php
            $id = $_GET['id'];
            ?>
            <form method="POST" action="action/dikerjakandatauserdesaineditact.php" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Order</label>
                  <input type="text" class="form-control" id="firstName" placeholder="Input Nama Desain" value="<?php echo htmlentities($result['nama_order']); ?>" name=" nama_desain" required>
                  <input type="text" class="form-control" name="id_desain_produk_user" value="<?php echo htmlentities($result['id_desain_produk_user']); ?>" name="id_desain_produk_user" placeholder="Nama User..." required hidden>
                  <input type="text" class="form-control" name="id_user" value="<?php echo htmlentities($result['id_user']); ?>" name="id_user" placeholder="Nama User..." required hidden>
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

                <div class="row">
                  <div class="form-group col-md-3 mb-3">
                    <label for="floatingInput">Size S</label>
                    <input type="number" class="form-control" id="s" placeholder="Input ukuran S" value="<?php echo htmlentities($result['ukuran_s']); ?>" name="ukuran_s" value="0" required OnMouseOver="sum();sumtotal();" OnMouseOut="sum();sumtotal();" onkeyup="sum();sumtotal();">
                  </div>
                  <div class="form-group col-md-3 mb-3">
                    <label for="floatingInput">Size M</label>
                    <input type="number" class="form-control" id="m" placeholder="Input ukuran M" name="ukuran_m" value="<?php echo htmlentities($result['ukuran_m']); ?>" value="0" required OnMouseOver="sum();sumtotal();" OnMouseOut="sum();sumtotal();" onkeyup="sum();sumtotal();">
                  </div>
                  <div class="form-group col-md-3 mb-3">
                    <label for="floatingInput">Size L</label>
                    <input type="number" class="form-control" id="l" placeholder="Input ukuran L" name="ukuran_l" value="<?php echo htmlentities($result['ukuran_l']); ?>" value="0" required OnMouseOver="sum();sumtotal();" OnMouseOut="sum();sumtotal();" onkeyup="sum();sumtotal();">
                  </div>
                  <div class="form-group col-md-3 mb-3">
                    <label for="floatingInput">Size XL</label>
                    <input type="number" class="form-control" id="xl" placeholder="Input ukuran XL" name="ukuran_xl" value="<?php echo htmlentities($result['ukuran_xl']); ?>" value="0" required OnMouseOver="sum();sumtotal();" OnMouseOut="sum();sumtotal();" onkeyup="sum();sumtotal();">
                  </div>
                </div>
                <div class="form-group">
                  <label for="zip">Harga Satuan</label>
                  <input type="text" class="form-control" id="hargasatuanview" value="<?php echo "Rp " . number_format($result['harga_produk'], 0, ",", "."); ?>" placeholder="0" required readonly>
                  <input type="number" class="form-control" id="hargasatuan" value="<?php echo htmlentities($result['harga_produk']); ?>" placeholder="0" required hidden>
                </div>
                <div class="form-group">
                  <label for="zip">Jumlah Kaos</label>
                  <input type="number" class="form-control" id="banyakkaos" value="<?php echo $totalkaos; ?>" placeholder="0" required readonly>
                </div>
                <div class="form-group">
                  <label for="zip">Total Harga (Rp)</label>
                  <input type="text" class="form-control" id="totalhargaview" name="totalharga" placeholder="0" required readonly>
                  <input type="number" class="form-control" id="totalharga" name="totalharga" placeholder="0" required hidden>
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Ubah</button>
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