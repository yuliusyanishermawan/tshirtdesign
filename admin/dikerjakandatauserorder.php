<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
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
              <h3 class="card-title">Order User Offline</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_user WHERE id_user='$id'";
            $query = mysqli_query($koneksidb, $sql);
            $result = mysqli_fetch_array($query);
            ?>
            <form method="POST" enctype="multipart/form-data" action="action/dikerjakandatauserorderact">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Lengkap User</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo htmlentities($result['nama_lengkap']); ?>" name="nama_lengkap" readonly>
                  <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo htmlentities($result['id_user']); ?>" name="id_user" hidden>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nomor Telfon</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo htmlentities($result['nomor']); ?>" name="nomor" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <textarea class="form-control" rows="3" value="" name="alamat"><?php echo htmlentities($result['alamat']); ?></textarea>
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
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Buat Pesanan</button>
              </div>

          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Desain</th>
                  <th>Nama Produk</th>
                  <th style="width: 70px;">Ukuran</th>
                  <th>Total Harga</th>
                  <th>Gambar Depan</th>
                  <th>Gambar Belakang</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $arraytotal = [];
                $nomor = 0;
                $sql = "SELECT * FROM tbl_desain_produk_user INNER JOIN tbl_user ON tbl_desain_produk_user.id_user=tbl_user.id_user INNER JOIN tbl_produk ON tbl_desain_produk_user.id_produk=tbl_produk.id_produk WHERE tbl_user.id_user='$id' AND tbl_desain_produk_user.no_invoice= 'NULL'";
                $query = @mysqli_query($koneksidb, $sql);
                while ($result = @mysqli_fetch_array($query)) {
                  $nomor++;
                ?>
                  <tr>
                    <td><?php echo htmlentities($nomor); ?></td>
                    <td><?php echo htmlentities($result['nama_order']); ?></td>
                    <td><?php echo htmlentities($result['nama_produk']); ?></td>
                    <td>Ukuran S:<?php echo htmlentities($result['ukuran_s']); ?>, Ukuran M:<?php echo htmlentities($result['ukuran_m']); ?>, Ukuran L:<?php echo htmlentities($result['ukuran_l']); ?>, Ukuran XL:<?php echo htmlentities($result['ukuran_xl']); ?></td>
                    <td><?php echo "Rp " . number_format($result['total_harga_desain_produk_user'], 2, ",", "."); ?></td>
                    <td><a href="../imagedesainuser/<?php echo htmlentities($result['gambar_depan']); ?>" target="blank"><img src="../imagedesainuser/<?php echo htmlentities($result['gambar_depan']); ?>" width="100" height="100"></a></td>
                    <td><a href="../imagedesainuser/<?php echo htmlentities($result['gambar_belakang']); ?>" target="blank"><img src="../imagedesainuser/<?php echo htmlentities($result['gambar_belakang']); ?>" width="100" height="100"></a></td>
                    <td class="text-right">
                      <a href="action/dikerjakandesainhapusact?id=<?php echo htmlentities($result['id_desain_produk_user']); ?>" onclick="return confirm('Apakah anda yakin akan menghapus desain judul <?php echo $result['nama_order']; ?>?');" class="btn btn-danger"> Remove</a>
                    </td>
                  </tr>
                  <?php
                  $harga = ($result['ukuran_s'] + $result['ukuran_m'] + $result['ukuran_l'] + $result['ukuran_xl']) * $result['harga_produk'];
                  ?>
                  <input type="number" name="id_desain_produk_user[]" value="<?php echo htmlentities($result['id_desain_produk_user']); ?>" hidden>
                  <input type="number" name="harga[]" value="<?php echo htmlentities($harga); ?>" hidden>
                <?php
                  array_push($arraytotal, $harga);
                }
                $totalharga = array_sum($arraytotal);
                ?>
            </table>
          </div>

          </form>

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
?>