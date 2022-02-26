<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
  $title = "Data produk";
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
            $sql = "SELECT * FROM tbl_produk WHERE id_produk='$id'";
            $query = mysqli_query($koneksidb, $sql);
            $result = mysqli_fetch_array($query);
            ?>
            <form action="action/produkubahact" method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Produk</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" readonly value="<?php echo $result['nama_produk']; ?>" name="nama_produk">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Kaos</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" readonly value="<?php echo $result['jenis_kaos']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Warna Kaos</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" readonly value="<?php echo $result['warna_kaos']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Harga Produk (RP)</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga Tanpa Titik" value=<?php echo $result['harga_produk']; ?> name="harga_produk">
                </div>
                <div class="row">
                  <div class="col-3 form-group">
                    <label for="exampleInputEmail1">Stok S</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Stok S Saat Ini" value=<?php echo $result['stok_s']; ?> readonly>
                  </div>
                  <div class="col-3 form-group">
                    <label for="exampleInputEmail1">Stok M</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Stok M Saat Ini" value=<?php echo $result['stok_m']; ?> readonly>
                  </div>
                  <div class="col-3 form-group">
                    <label for="exampleInputEmail1">Stok L</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Stok L Saat Ini" value=<?php echo $result['stok_l']; ?> readonly>
                  </div>
                  <div class="col-3 form-group">
                    <label for="exampleInputEmail1">Stok XL</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Stok XL Saat Ini" value=<?php echo $result['stok_xl']; ?> readonly>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
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
<?php
  include('includes/footer.php');
}
?>