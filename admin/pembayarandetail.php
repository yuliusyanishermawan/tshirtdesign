<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $title = "Pembayaran";
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
              <h3 class="card-title"><?= $title; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_order INNER JOIN tbl_user ON tbl_order.id_user=tbl_user.id_user WHERE no_invoice='$id'";
            $query = mysqli_query($koneksidb, $sql);
            $result = mysqli_fetch_array($query);
            ?>
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">No Invoice</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo htmlentities($result['no_invoice']); ?>" placeholder="Enter email" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Pemesan</label>
                  <input style="text-transform: uppercase;" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo htmlentities($result['nama_lengkap']); ?>" placeholder="Enter email" disabled>
                </div>
                <div class="form-group">
                  <label for="inputCity">Alamat Pengiriman</label>
                  <input type="text" class="form-control" id="inputCity" value="<?php echo htmlentities($result['alamat_pengiriman']); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="inputCity">Kode Pos</label>
                  <input type="text" class="form-control" id="inputCity" value="<?php echo htmlentities($result['kodepos']); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="inputCity">Kabupaten/Kota</label>
                  <input type="text" class="form-control" id="inputCity" value="<?php echo htmlentities($result['kota']); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="inputCity">Provinsi</label>
                  <input type="text" class="form-control" id="inputCity" value="<?php echo htmlentities($result['provinsi']); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="inputCity">Paket</label>
                  <input type="text" class="form-control" id="inputCity" value="<?php echo htmlentities($result['paket']); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="inputCity">Expedisi</label>
                  <input type="text" class="form-control" id="inputCity" value="<?php echo htmlentities($result['ekspedisi']); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="inputCity">Berat</label>
                  <input type="text" class="form-control" id="inputCity" value="<?php echo htmlentities($result['berat_order']); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="inputCity">Estimasi</label>
                  <input type="text" class="form-control" id="inputCity" value="<?php echo htmlentities($result['estimasi']); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="inputCity">Biaya Ongkir</label>
                  <input type="text" class="form-control" id="inputCity" value="<?php echo "Rp " . number_format($result['biaya_ongkir'], 2, ",", "."); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="inputCity">Total Biaya</label>
                  <input type="text" class="form-control" id="inputCity" value="<?php echo "Rp " . number_format($result['total_biaya'], 2, ",", "."); ?>" disabled>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status_promo" disabled>
                    <option selected value="<?php echo htmlentities($result['status']); ?>"><?php echo htmlentities($result['status']); ?></option>
                  </select>
                </div>
                <div class="card-footer">
                  <a href="pembayarandata.php" type="button" class="btn btn-primary">Kembali</a>
                </div>
            </form>
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
                </tr>
              </thead>
              <tbody>
                <?php
                $nomor = 0;
                $sql = "SELECT * FROM tbl_desain_produk_user INNER JOIN tbl_order ON tbl_desain_produk_user.no_invoice=tbl_order.no_invoice INNER JOIN tbl_produk ON tbl_desain_produk_user.id_produk=tbl_produk.id_produk WHERE tbl_order.no_invoice='$id'";
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
                  </tr>
                <?php } ?>
            </table>
          </div>

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
  <!-- /.content -->


<?php
  include('includes/footer.php');
}
?>